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

Route::get('/', 'PostController@index');

Auth::routes();

Route::get('/top', 'PostController@index')->name('posts.index');
Route::resource('posts', 'PostController');

Route::get('/posts/edit', 'PostController@edit')->name('posts.edit');
Route::patch('/posts', 'PostController@update')->name('posts.update');
