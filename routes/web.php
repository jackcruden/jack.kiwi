<?php

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

Auth::routes();

Route::view('morsel', 'pages.morsel');

// URL shortener (must be at bottom of web.php)
Route::resource('links', 'LinkController');
Route::get('{url}', 'LinkController@show');
