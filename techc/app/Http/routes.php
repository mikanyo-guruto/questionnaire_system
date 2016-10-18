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

Route::get('/list/{genre}', 'ProductController@genre');

Route::get('/questionnaires', 'QuestionnaireController@index');

Route::get('/list/detail/{id}', 'Product_detailController@index');

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

Route::get('/questionnaire', function() {
	return redirect('questionnaires/questionnaire');
});

// adminルーティング
Route::get('admin/list', 'AdminController@getIndex');

Route::get('admin/list/detail/{id}', 'AdminController@detail');

Route::get('admin/venue', 'AdminController@venue');

Route::get('admin/venue/venue_detail', 'AdminController@venue_detail');

Route::get('admin/edit', 'AdminController@edit');

Route::get('admin/create', 'AdminController@create');

Route::post('admin/create_conf', 'AdminController@create_conf');

Route::post('admin/create_run', 'AdminController@create_run');
