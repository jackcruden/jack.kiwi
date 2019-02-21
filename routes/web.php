<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Post;

// Temporary for Emma's hunt
// Route::view('em', 'pages.em');

// Menu
Route::view('/', 'pages.index');
Route::view('projects', 'projects.index');
Route::get('projects/{project}', [ProjectController::class, 'show']);
Route::view('blog', 'posts.index');
Route::get('blog/{post}', [PostController::class, 'show']);
Route::get('tags/{tag}', [TagController::class, 'show']);
Route::get('me', function () {
    return view('posts.show', ['post' => Post::findBySlug('me')]);
});

Auth::routes();

// Route::resource('links', 'LinkController');
// Route::get('{url}', 'LinkController@show');
