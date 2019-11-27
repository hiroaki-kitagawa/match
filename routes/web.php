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

Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/mypage', function () {return  view('mypage'); });

    Route::get('ajax/job_all', 'Ajax\JobsController@job_all');
    Route::get('ajax/job_single', 'Ajax\JobsController@job_single');
    Route::get('ajax/job_service', 'Ajax\JobsController@job_service');
    Route::get('ajax/my_job_submit', 'Ajax\JobsController@my_job_submit');
    Route::get('ajax/my_job_applied', 'Ajax\JobsController@my_job_applied');
    Route::get('ajax/my_public_message', 'Ajax\ChatController@my_public_message');
    Route::get('ajax/my_direct_message', 'Ajax\ChatController@my_direct_message');

    Route::post('ajax/send_public_message', 'Ajax\ChatController@send_public_message');

    Route::get('jobs/create', 'JobsController@create');
    Route::get('jobs/{id}', 'JobsController@show');
    Route::post('jobs/store', 'JobsController@store');
    Route::get('jobs/edit/{id}', 'JobsController@edit');
    Route::post('jobs/update/{id}', 'JobsController@update');
    Route::get('jobs/delete/{id}', 'JobsController@delete');

    Route::post('messages/store', 'MessagesController@store');
    Route::post('messages/storeDM', 'MessagesController@storeDM');

    Route::get('profile/edit', 'ProfileController@edit');
    Route::post('profile/update', 'ProfileController@update');

    Route::get('applications/index', 'ApplicationController@index');
    Route::get('applications/{id}', 'ApplicationController@show');
    Route::post('applications/store', 'ApplicationController@store');

    Route::get('logout', function () {return view('logout'); });

    Route::resource('password', 'PasswordController', ['only' => ['index', 'create',
    'store', 'show', 'edit', 'update', 'destroy']]);
});
