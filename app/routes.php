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

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('entries', 'EntriesController');
Route::resource('users', 'UsersController');

// route to show the login form
Route::get('login', array('uses' => 'UsersController@login', 'as' => 'login'));

// route to process the form
Route::post('signin', array('uses' => 'UsersController@signIn', 'as' => 'signin'));
