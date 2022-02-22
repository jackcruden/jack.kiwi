<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\TagController;
use App\Models\Post;
use App\Models\Tag;

Auth::routes();
Route::feeds();

// Pages
Route::view('/', 'pages.index');
Route::view('travel', 'pages.travel');

// Projects
Route::get('projects', function () {
    return view('tags.show', ['tag' => Tag::findBySlug('project')]);
});
Route::view('projects/{post}', 'posts.show');

// Sketches
Route::get('sketches', function () {
    return view('tags.show', ['tag' => Tag::findBySlug('sketch')]);
});
Route::view('sketches/{post}', 'posts.show');

// Blog
Route::view('blog', 'posts.index');
Route::view('blog/{post}', 'posts.show');
Route::get('tags/{tag}', [TagController::class, 'show']);
Route::get('me', function () {
    return view('posts.show', ['post' => Post::findBySlug('me')]);
});

// Images
Route::get('storage/{name}.thumbnail.{extension}', [ImageController::class, 'thumbnail']);

Route::resource('links', LinkController::class);
Route::get('{link?}', [LinkController::class, 'show'])->where('link', '^(?!nova|horizon.*$).*');
