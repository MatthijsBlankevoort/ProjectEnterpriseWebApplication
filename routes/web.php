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

Route::get('/', 'PostsController@index');
Route::get('/sorted', 'PostsController@sortBy');
Route::get('/createpost', 'PostsController@create');
//Route::get('/pindakaas', 'PostsController@alreadyLiked');
Route::resource('profile', 'ProfilesController');

Route::get('/like/insert/{id}','LikesController@store');
Route::get('/like/update/{id}','LikesController@update');
//Route::resource('Likes', 'LikesController');

Route::get('/submitpost', 'CategoriesController@getAll');
Route::post('/submitpost/create', 'PostsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
