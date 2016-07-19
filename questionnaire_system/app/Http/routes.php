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

Route::get('/', function() {
    return view('index');
});

Route::get('/list/game', function() {
	return view('list/game');
});

Route::get('/list/illust', function() {
	return view('list/illust');
});

Route::get('/w01', function() {
	return view('w01');
});

Route::get('/list/it', function() {
	return view('list/it');
});