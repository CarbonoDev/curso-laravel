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

Route::group([
    'prefix' => 'posts',
    'middleware' => 'auth'
  ], function () {
    Route::get('/', [
      'as' => 'posts.index',
      'uses' => 'PostsController@index'
      ]);

    Route::get('me', [
      'as' => 'posts.my_posts',
      'uses' => 'PostsController@myPosts'
      ]);

    Route::post('{post_id?}', [
      'as' => 'posts.process',
      'uses' => 'PostsController@process'
      ]);

    Route::get('create', [
      'as' => 'posts.create',
      'uses' => 'PostsController@create'
      ]);

    Route::get('{post_id}', [
      'as' => 'posts.show',
      'uses' => 'PostsController@show'
      ]);

    Route::get('{post_id}/edit', [
      'as' => 'posts.edit',
      'uses' => 'PostsController@edit'
      ]);


    Route::delete('{post_id}', [
      'as' => 'posts.destroy',
      'uses' => 'PostsController@destroy'
      ]);

    Route::model('post_id', 'App\Post');

});

Route::group(['prefix' => 'auth'], function () {
  // Authentication routes...
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
});
