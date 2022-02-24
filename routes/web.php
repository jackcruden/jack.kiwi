<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Livewire\CreatePost;
use App\Models\Post;
use App\Models\Tag;

Auth::routes();
Route::feeds();

Route::view('/', 'pages.index')->name('home');
Route::resource('posts', PostController::class)->except(['store', 'update']);

// Projects
Route::get('projects', function () {
    return view('tags.show', ['tag' => Tag::findBySlug('project')]);
})->name('projects');
Route::resource('projects', PostController::class)->only('show');

// Sketches
Route::get('sketches', function () {
    return view('tags.show', ['tag' => Tag::findBySlug('sketch')]);
})->name('sketches');
Route::view('sketches/{post}', 'posts.show');

// Blog
Route::view('blog', 'posts.index')->name('blog');
Route::view('blog/{post}', 'posts.show');
Route::get('tags/{tag}', [TagController::class, 'show'])->name('tags.show');
Route::get('me', function () {
    return view('posts.show', ['post' => Post::findBySlug('me')]);
})->name('me');

// Images
Route::get('storage/{name}.thumbnail.{extension}', [ImageController::class, 'thumbnail']);

Route::resource('links', LinkController::class);
Route::get('{link?}', [LinkController::class, 'show'])->where('link', '^(?!nova|horizon.*$).*');
