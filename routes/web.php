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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mypage', function () {return  view('mypage'); });

Route::get('ajax/job_all', 'Ajax\JobsController@job_all');
Route::get('ajax/job_single', 'Ajax\JobsController@job_single');
Route::get('ajax/job_service', 'Ajax\JobsController@job_service');
Route::get('ajax/my_job_submit', 'Ajax\JobsController@my_job_submit');
Route::get('ajax/my_job_applied', 'Ajax\JobsController@my_job_applied');
Route::get('ajax/my_public_message', 'Ajax\JobsController@my_public_message');
Route::get('ajax/my_direct_message', 'Ajax\JobsController@my_direct_message');

Route::get('/jobs/{id}', 'JobsController@show');


Route::resource('profile', 'ProfileController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
Route::resource('application', 'ApplicationController', ['only' => ['index', 'show', 'update' ,'destroy']]);
Route::resource('jobs', 'JobsController', ['only' => ['index', 'create',
    'store', 'show', 'destroy']]);
Route::resource('messages', 'MessagesController', ['only' => ['index', 'create',
    'store', 'show', 'edit', 'update', 'destroy']]);
Route::resource('password', 'PasswordController', ['only' => ['index', 'create',
    'store', 'show', 'edit', 'update', 'destroy']]);
