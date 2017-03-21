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

Route::resource('posts', 'PostController');

Route::post('/posts/{post}/like', 'PostController@like');

Route::resource('posts.comments', 'CommentController', ['except' => [
    'index', 'show', 'create'
]]);

Route::resource('posts.comments', 'PostCommentController');
Route::resource('createpostidea', "CreatePostController");
Auth::routes();
