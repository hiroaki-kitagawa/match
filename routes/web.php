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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('profile', 'ProfileController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
Route::resource('application', 'ApplicationController', ['only' => ['index', 'show', 'update' ,'destroy']]);
Route::resource('jobs', 'JobsController', ['only' => ['index', 'create',
    'store', 'show', 'destroy']]);
Route::resource('messages', 'MessagesController', ['only' => ['index', 'create',
    'store', 'show', 'edit', 'update', 'destroy']]);
Route::resource('password', 'PasswordController', ['only' => ['index', 'create',
    'store', 'show', 'edit', 'update', 'destroy']]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
