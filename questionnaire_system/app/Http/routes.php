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

Route::get('/list/detail/game', function() {
	return view('list/detail/game');
});

Route::get('/list/illust', function() {
	return view('list/illust');
});

Route::get('/list/detail/illust', function() {
	return view('list/detail/illust');
});

Route::get('/list/it', function() {
	return view('list/it');
});

Route::get('/list/detail/it', function() {
	return view('list/detail/it');
});

Route::get('/ranking/index', function() {
	return view('ranking/index');
});

Route::get('/ranking/all', function() {
	return view('ranking/all');
});

Route::get('/ranking/game', function() {
	return view('ranking/game');
});

Route::get('/ranking/illust', function() {
	return view('ranking/illust');
});

Route::get('/ranking/it', function() {
	return view('ranking/it');
});

Route::get('/questionnaires/questionnaire', function() {
	return view('questionnaires/questionnaire');
});

