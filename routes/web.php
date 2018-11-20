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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// URL shortener (must be at bottom of web.php)
Route::resource('links', 'LinkController');
Route::get('{url}', 'LinkController@show');
// Route::get('urls/create', 'UrlController@create');
// Route::get('urls/{url}/edit', 'UrlController@edit');
// Route::post('urls', 'UrlController@store');
// Route::put('urls/{url}', 'UrlController@update');
