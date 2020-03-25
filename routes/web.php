<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/like/{post}', 'LikesController@store');

Route::post('/comment', 'CommentsController@store');
Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/home', 'PostsController@index');


Route::post('/post', 'PostsController@store');
Route::get('/post/create', 'PostsController@create');
Route::get('/post/{post}', 'PostsController@show');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/users', 'ProfilesController@index')->name('profile.index');
