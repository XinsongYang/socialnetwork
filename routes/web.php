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

Auth::routes();

Route::get('/', 'HomeController@home');

Route::get('/home', 'HomeController@home');

Route::get('/friends', 'FriendsController@show');

Route::post('/addfriend/{id}', 'FriendsController@add');

Route::post('/removefriend/{id}', 'FriendsController@remove');

Route::get('/profile/edit', 'ProfilesController@edit');

Route::post('/profile/edit', 'ProfilesController@update');

Route::post('/posts', 'PostsController@store');

Route::delete('/posts/{id}', 'PostsController@destroy');

Route::post('/comments/{id}', 'CommentsController@store');

Route::post('/likes/{id}', 'LikesController@click');

Route::get('/moments', 'HomeController@index');

Route::get('/search', 'HomeController@search');

Route::get('/{username}', 'UsersController@user');
// GET POST PATCH DELETE