<?php

use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'pages.index');
Route::view('me', 'pages.me');
Route::view('projects', 'projects.index');

Route::get('blog/{post}', [PostController::class, 'show']);

Route::get('tags/{tag}', function ($tag) {
    return view('tags.show', ['tag' => $tag]);
});

Auth::routes();

// Route::resource('links', 'LinkController');
// Route::get('{url}', 'LinkController@show');
