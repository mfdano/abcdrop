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
use Illuminate\Support\Facades\Log;


Route::get('/','ActivitiesController@getActivities');

Route::group(['prefix' => 'users'], function () {
	Route::post('add','UsersController@store');
	Route::get('all','UsersController@index');
	Route::get('isEmailUsed','UsersController@isEmailUsed');
	Route::post('login','UsersController@login');
	Route::get('logout','UsersController@logout');
	Route::get('stats','UsersController@stats');
});

Route::group(['prefix' => 'activity'], function () {
	Route::post('add','ActivitiesController@add');
});

Route::get('activity_farm', function(){
    return View('activity_farm'); // Your Blade template name
});

Route::get('activity_space', function(){
    return View('activity_space'); // Your Blade template name
});

Route::get('activity_sports', function(){
    return View('activity_sports'); // Your Blade template name
});

Route::get('activity_school', function(){
    return View('activity_school'); // Your Blade template name
});

Route::get('activity_superheroes', function(){
    return View('activity_superheroes'); // Your Blade template name
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
