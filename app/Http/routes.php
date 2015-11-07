<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts',[
  'as' => 'posts.index',
	'uses' => 'PostsController@index'
	]);

Route::post('posts',[
  'as' => 'posts.store',
	'uses' => 'PostsController@store'
	]);

Route::get('posts/create',[
  'as' => 'posts.create',
	'uses' => 'PostsController@create'
	]);

Route::get('posts/{id}',[
  'as' => 'posts.show',
	'uses' => 'PostsController@show'
	]);

Route::get('posts/{id}/edit',[
  'as' => 'posts.edit',
	'uses' => 'PostsController@edit'
	]);

Route::post('posts/{id}',[
  'as' => 'posts.update',
	'uses' => 'PostsController@update'
	]);

Route::delete('posts/{id}',[
  'as' => 'posts.destroy',
	'uses' => 'PostsController@destroy'
	]);



