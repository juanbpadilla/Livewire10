<?php

use App\Livewire\Articles;
use App\Livewire\ArticleForm;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', Articles::class)->name('articles.index');

Route::get('/blog/crear', ArticleForm::class)
    ->name('articles.create')
    ->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
