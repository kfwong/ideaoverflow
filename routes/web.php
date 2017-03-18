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

Route::get('/posts/{id}', 'PostController@view')->where('id', '[0-9]+');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::delete('/posts/{id}/delete', 'PostController@delete')->where('id', '[0-9]+');
Route::put('/posts/{id}/update', 'PostController@update')->where('id', '[0-9]+');

Route::resource('posts.comments', 'PostCommentController');

Auth::routes();

Route::get('/home', 'HomeController@index');
