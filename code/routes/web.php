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

// Route::get('/', function () {
//     return view('welcome');
// });

// Top Page
Route::get('/', 'StaticPagesController@index');

// Users
Route::get('/users', 'UsersController@index');
Route::get('/users/{id}', 'UsersController@show');
Route::get('/signup', 'UsersController@add');
Route::post('/signup', 'UsersController@create');
Route::get('/users/{id}edit', 'UsersController@edit');
Route::put('/users/{id}', 'UsersController@update');
Route::delete('users/:id', 'UsersController@destroy');
