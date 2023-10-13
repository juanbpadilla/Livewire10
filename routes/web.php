<?php

use App\Livewire\ArticleForm;
use App\Livewire\ArticleShow;
use App\Livewire\ArticlesTable;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/blog/{article}', ArticleShow::class)
    ->name('articles.show');

//Dashboard routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('dashboard')->group(function () {

    Route::view('/', 'dashboard')->name('dashboard');

    Route::get('/blog', ArticlesTable::class)
        ->name('articles.index');

    Route::get('/blog/crear', ArticleForm::class)
        ->name('articles.create');

    Route::get('/blog/{article:id}/edit', ArticleForm::class)
        ->name('articles.edit');

});
