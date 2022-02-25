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

// Posts
Route::resource('posts', PostController::class)->except(['store', 'update']);

// Blog
Route::prefix('blog')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('blog.index');
    Route::get('{blog}', [PostController::class, 'show'])->name('blog.show');
});

// Projects
Route::prefix('projects')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('projects.index');
    Route::get('{project}', [PostController::class, 'show'])->name('projects.show');
});

// Sketches
Route::prefix('sketches')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('sketches.index');
    Route::get('{sketch}', [PostController::class, 'show'])->name('sketches.show');
});

Route::get('tags/{tag}', [TagController::class, 'show'])->name('tags.show');
//Route::get('me', function () {
//    return view('posts.show', ['post' => Post::findBySlug('me')]);
//})->name('me');

Route::resource('links', LinkController::class);
Route::get('{link?}', [LinkController::class, 'show'])->where('link', '^(?!nova|horizon.*$).*');
