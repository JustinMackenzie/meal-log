<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@home', 'as' => 'home'));

Route::resource('entries', 'EntriesController');

Route::get('entries/archive/{date}', array('uses' => 'EntriesController@archive', 'as' => 'entries.archive'));

Route::resource('users', 'UsersController');

Route::resource('weights', 'WeightsController');

Route::resource('profiles', 'ProfilesController');

Route::resource('foods', 'FoodsController');

// route to show the login form
Route::get('login', array('uses' => 'UsersController@login', 'as' => 'login'));

// route to show the login form
Route::get('signout', array('uses' => 'UsersController@signout', 'as' => 'signout'));

// route to process the form
Route::post('signin', array('uses' => 'UsersController@signIn', 'as' => 'signin'));
