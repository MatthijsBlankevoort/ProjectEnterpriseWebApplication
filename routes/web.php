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
Route::get('/', 'PagesController@index');
Route::get('/createpost', 'PostsController@create');
// Route::get('/profile/settings', 'ProfilesController@create');  
// Route::get('/profile/edit', 'ProfilesController@edit');  
// Route::get('/profile/showprofile', 'ProfilesController@index');  
Route::resource('profile', 'ProfilesController');

Route::get('/submitpost', 'CategoriesController@getAll');

Route::post('/submitpost/create', 'PostsController@store');

