<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'EventsController@index');
Route::get('/registerd/list','ExpositionMapController@getEventsList');

Route::get('/api/events','EventsController@getEvents');
Route::get('booking/{id}','ExpositionMapController@index');
Route::any('reserve','ExpositionMapController@reserve');


Route::auth();

Route::get('/home', 'HomeController@index');
 