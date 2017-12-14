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

Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');
Route::get('profile','HomeController@profile');
Route::post('profile/{id}','HomeController@updateProfile');
Route::get('/register', function()
{
	return view('auth.register');
});
Route::post('events/rsvp/{eventId}','UserController@rsvp');
Route::post('events/rsvp/{eventId}/remove','UserController@removeRsvp');
Route::get('events/upcoming','UserController@getEvents');
Route::get('events/rides','UserController@getRides');
Route::get('events/event/{id}','UserController@getEventDetails');
Route::resource('users', 'UserManagementController');
Route::resource('events', 'EventManagementController');
Route::post('/rides/{id}/remove/{user}','RideManagementController@removeRider');
Route::post('/rides/{id}/add','RideManagementController@addRider');
Route::resource('rides', 'RideManagementController');
Route::get('/login', function()
{
	return view('auth.login');
})->name('login');

Route::post('/login','Auth\LoginController@login');

Route::get('/logout','Auth\LoginController@logout');

Route::post('/auth/register','Auth\RegisterController@postRegister');


/*
Route::get('/documentation', function()
{
	return view('documentation');
});

Route::get('/charts', function()
{
    return view('mcharts');
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
});*/

