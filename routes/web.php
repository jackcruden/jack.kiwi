<?php

use App\Post;
use App\Http\Controllers\PostController;

// Menu
Route::view('/', 'pages.index');
Route::view('projects', 'projects.index');
Route::get('blog/{post}', [PostController::class, 'show']);
Route::get('me', function () {
    return view('posts.show', ['post' => Post::findBySlug('me')]);
});

// Blog functions
Route::get('tags/{tag}', function ($tag) {
    return view('tags.show', ['tag' => $tag]);
});

Auth::routes();

// Route::resource('links', 'LinkController');
// Route::get('{url}', 'LinkController@show');
