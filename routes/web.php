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

	return view('home');
});

Route::get('/charts', function()
{
	return view('mcharts');
});



Route::get('/register', function()
{
	return view('auth.register');
});



Route::get('/tables', function()
{
	return view('table');
});

Route::get('/forms', function()
{
	return view('form');
});

Route::get('/grid', function()
{
	return view('grid');
});

Route::get('/buttons', function()
{
	return view('buttons');
});


Route::get('/icons', function()
{
	return view('icons');
});

Route::get('/panels', function()
{
	return view('panel');
});

Route::get('/typography', function()
{
	return view('typography');
});

Route::get('/notifications', function()
{
	return view('notifications');
});

Route::get('/blank', function()
{
	return view('blank');
});

Route::get('/login', function()
{
	return view('auth.login');
});

Route::post('/login','LoginController@login');

Route::get('/logout','LoginController@logout');

Route::post('/auth/register','Auth\RegisterController@postRegister');

Route::get('/documentation', function()
{
	return view('documentation');
});

Route::resource('events', 'EventManagementController');
Route::post('/rides/{id}/remove/{user}','RideManagementController@removeRider');
Route::post('/rides/{id}/add','RideManagementController@addRider');
Route::resource('rides', 'RideManagementController');