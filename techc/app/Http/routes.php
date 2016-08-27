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

Route::get('/list', 'AdminController@getIndex');

Route::get('/list/detail/{id}', 'AdminController@detail');

Route::get('/venue', 'AdminController@venue');

Route::get('/venue/venue_detail', 'AdminController@venue_detail');

Route::get('/edit', 'AdminController@edit');

Route::get('/create', 'AdminController@create');

Route::post('/create_conf', 'AdminController@create_conf');