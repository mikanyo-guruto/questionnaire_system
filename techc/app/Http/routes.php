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

Route::get('admin/list', 'AdminController@getIndex');

Route::get('admin/list/detail/{id}', 'AdminController@detail');

Route::get('admin/venue', 'AdminController@venue');

Route::get('admin/venue/venue_detail', 'AdminController@venue_detail');

Route::get('admin/edit', 'AdminController@edit');

Route::get('admin/create', 'AdminController@create');

Route::post('admin/create_conf', 'AdminController@create_conf');

Route::post('admin/create_run', 'AdminController@create_run');