<?php

namespace App\Livewire;

use Livewire\Component;

class Articles extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.articles', [
            'articles' => \App\Models\Article::all()
        ])->layout('layouts.guest');
    }
}
