<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ArticleForm extends Component
{
    public Article $article;

    protected function rules(): array
    {
        return [
            'article.title' => ['required', 'min:4'],
            'article.slug' => [
                'required',
                Rule::unique('articles', 'slug')->ignore($this->article)
            ],
            'article.content' => ['required'],
        ];
    }

    public function mount(Article $article): void
    {
        $this->article = $article;
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function save(): void
    {
        $this->validate();

        $this->article->save();

        session()->flash('status', __('Artícle saved.'));

        $this->redirectRoute('articles.index');
    }

    public function render()
    {
        return view('livewire.article-form');
    }
}
