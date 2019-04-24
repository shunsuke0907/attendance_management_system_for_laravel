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

// Top Page
Route::get('/', 'StaticPagesController@index');

// Sessions
Route::get('/login', 'SessionsController@add');
Route::post('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');

// Users
Route::group(['middleware' => 'isLogin'], function () {
    Route::group(['middleware' => 'isAdmin'], function () {
        Route::get('/users', 'UsersController@index');
        Route::delete('users/{user}', 'UsersController@destroy');
        Route::put('/users/{user}/info', 'UsersController@updateUserInfo');
    });

    Route::group(['middleware' => 'isCorrectUser'], function () {
        Route::get('/users/{id}', 'UsersController@show');
    });

    Route::get('/users/{user}/edit', 'UsersController@edit');
    Route::put('/users/{user}', 'UsersController@update');
});

Route::get('/signup', 'UsersController@add');
Route::post('/signup', 'UsersController@create');
