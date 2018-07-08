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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => '/'], function() {
	Route::get('/', function() {
	    echo 'Index';
	});
	Route::resource('post', 'Post\PostController', ['only' => ['index', 'show']]);
	Route::resource('category', 'Post\CategoryController', ['only' => ['index', 'show']]);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/', 'Admin\DashboardController@index');
	Route::get('/posts', 'Post\PostController@adminIndex')->name('admin.index');
	Route::resource('post', 'Post\PostController', ['except' => ['index', 'show']]);
	Route::resource('category', 'Post\CategoryController', ['except' => ['index', 'show']]);
});
