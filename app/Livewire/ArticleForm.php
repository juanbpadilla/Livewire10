<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleForm extends Component
{
    public $title;
    public $content;

    public function save()
    {
        $article = new Article;
        $article->title = $this->title;
        $article->content = $this->content;
        $article->save();

        session()->flash('status', __('Artícle created.'));

        $this->redirectRoute('articles.index');
    }

    public function render()
    {
        return view('livewire.article-form')
            ->layout('layouts.app');
    }
}
