<?php

namespace Tests\Feature\Livewire;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ArticleFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guests_cannot_create_or_update_articles()
    {
        $this->get(route('articles.create'))
            ->assertRedirect('login');

        $article = Article::factory()->create();

        $this->get(route('articles.edit', $article))
            ->assertRedirect('login');
    }

    /** @test */
    function article_form_renders_properly()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('articles.create'))
            ->assertSeeLivewire('article-form');

        $article = Article::factory()->create();

        $this->actingAs($user)->get(route('articles.edit', $article))
            ->assertSeeLivewire('article-form');
    }

    /** @test */
    function blade_template_is_wired_properly()
    {
        Livewire::test('article-form')
            ->assertSeeHtml('wire:submit="save"')
            ->assertSeeHtml('wire:model.live="article.title"')
            ->assertSeeHtml('wire:model.live="article.slug"')
            ->assertSeeHtml('wire:model.live="article.content"');
    }

    /** @test */
    function can_create_new_articles()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test('article-form')
            ->set('article.title', 'New article')
            ->set('article.slug', 'new-article')
            ->set('article.content', 'Article content')
            ->call('save')
            ->assertSessionHas('status')
            ->assertRedirect(route('articles.index'));

        $this->assertDatabaseHas('articles', [
            'title' => 'New article',
            'slug' => 'new-article',
            'content' => 'Article content',
            'user_id' => $user->id
        ]);
    }

    /** @test */
    function can_update_articles()
    {
        $article = Article::factory()->create();

        $user = User::factory()->create();

        Livewire::actingAs($user)->test('article-form', ['article' => $article])
            ->assertSet('article.title', $article->title)
            ->assertSet('article.slug', $article->slug)
            ->assertSet('article.content', $article->content)
            ->set('article.title', 'Updated title')
            ->set('article.slug', 'updated-slug')
            ->call('save')
            ->assertSessionHas('status')
            ->assertRedirect(route('articles.index'));

        $this->assertDatabaseCount('articles', 1);

        $this->assertDatabaseHas('articles', [
            'title' => 'Updated title',
            'slug' => 'updated-slug',
            'user_id' => $user->id,
        ]);
    }

    /** @test */
    function title_is_required()
    {
        Livewire::test('article-form')
            ->set('article.content', 'Article content')
            ->call('save')
            ->assertHasErrors(['article.title' => 'required'])
            ->assertSeeHtml(__('validation.required', ['attribute' => 'title']));
        ;
    }

    /** @test */
    function slug_is_required()
    {
        Livewire::test('article-form')
            ->set('article.title', 'New Article')
            ->set('article.slug', null)
            ->set('article.content', 'Article content')
            ->call('save')
            ->assertHasErrors(['article.slug' => 'required'])
            ->assertSeeHtml(__('validation.required', ['attribute' => 'slug']));
    }

    /** @test */
    function slug_must_be_unique()
    {
        $article = Article::factory()->create();

        Livewire::test('article-form')
            ->set('article.title', 'New Article')
            ->set('article.slug', $article->slug)
            ->set('article.content', 'Article content')
            ->call('save')
            ->assertHasErrors(['article.slug' => 'unique'])
            ->assertSeeHtml(__('validation.unique', ['attribute' => 'slug']));
    }

    /** @test */
    function slug_must_only_contain_letters_numbers_dashes_and_underscores()
    {
        Livewire::test('article-form')
            ->set('article.title', 'New Article')
            ->set('article.slug', 'new-article$%^')
            ->set('article.content', 'Article content')
            ->call('save')
            ->assertHasErrors(['article.slug' => 'alpha_dash'])
            ->assertSeeHtml(__('validation.alpha_dash', ['attribute' => 'slug']));
    }

    /** @test */
    function slug_is_generated_automatically()
    {
        Livewire::test('article-form')
            ->set('article.title', 'Nuevo artículo')
            ->assertSet('article.slug', 'nuevo-articulo');
    }

    /** @test */
    function unique_rule_should_be_ignored_when_updating_the_same_slug()
    {
        $article = Article::factory()->create();

        $user = User::factory()->create();

        Livewire::actingAs($user)->test('article-form', ['article' => $article])
            ->set('article.title', 'New Article')
            ->set('article.slug', $article->slug)
            ->set('article.content', 'Article content')
            ->call('save')
            ->assertHasNoErrors(['article.slug' => 'unique']);
    }

    /** @test */
    function title_must_be_4_characters_min()
    {
        Livewire::test('article-form')
            ->set('article.title', 'Art')
            ->set('article.content', 'Article content')
            ->call('save')
            ->assertHasErrors(['article.title' => 'min'])
            ->assertSeeHtml(__('validation.min.string', [
                'attribute' => 'title',
                'min' => 4
            ]));
        ;
    }

    /** @test */
    function content_is_required()
    {
        Livewire::test('article-form')
            ->set('article.title', 'New Article')
            ->call('save')
            ->assertHasErrors(['article.content' => 'required'])
            ->assertSeeHtml(__('validation.required', ['attribute' => 'content']));
        ;
    }

    /** @test */
    function real_time_validation_works_for_title()
    {
        Livewire::test('article-form')
            ->set('article.title', '')
            ->assertHasErrors(['article.title' => 'required'])
            ->set('article.title', 'New')
            ->assertHasErrors(['article.title' => 'min'])
            ->set('article.title', 'New Article')
            ->assertHasNoErrors('article.title');
    }

    /** @test */
    function real_time_validation_works_for_content()
    {
        Livewire::test('article-form')
            ->set('article.content', '')
            ->assertHasErrors(['article.content' => 'required'])
            ->set('article.content', 'Article content')
            ->assertHasNoErrors('article.content');
    }
}
