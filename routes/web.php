<?php

use App\Http\Controllers\TagController;
use App\Post;
use App\Tag;

// Auth::routes();
Route::feeds();

// Pages
Route::view('/', 'pages.index');
Route::view('travel', 'pages.travel');

// Projects
Route::view('projects', 'tags.show', ['tag' => Tag::findBySlug('project')]);
Route::view('projects/{post}', 'posts.show');

// Sketches
Route::view('sketches', 'tags.show', ['tag' => Tag::findBySlug('sketch')]);
Route::view('sketches/{post}', 'posts.show');

// Blog
Route::view('blog', 'posts.index');
Route::view('blog/{post}', 'posts.show');
Route::get('tags/{tag}', [TagController::class, 'show']);
Route::get('me', function () {
    return view('posts.show', ['post' => Post::findBySlug('me')]);
});

Route::resource('links', 'LinkController');
Route::get('{link?}', 'LinkController@show')->where('link', '^(?!nova|horizon.*$).*');
