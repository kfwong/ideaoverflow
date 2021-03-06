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

Route::get('/posts/search', 'PostController@search');
Route::resource('posts', 'PostController');
Route::post('/posts/{post}/like', 'PostController@like');
Route::get('/posts/{post}/likers', 'PostController@viewLikers');

Route::resource('posts.comments', 'CommentController', ['except' => [
    'index', 'show', 'create'
]]);

Route::resource('users','UserController',['except'=>[
	'index','create','store','destroy']]);
	//temporarily forbid user 'create', 'store' and 'destroy' like posts

Auth::routes();
