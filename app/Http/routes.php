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

Route::get('user/list/{genre}', 'ProductController@genre');

Route::get('user/questionnaires/user_questionnaire', 'QuestionnaireController@index');

Route::get('user/list/detail/{id}', 'Product_detailController@index');

Route::get('user/ranking/index', function() {
	return view('user/ranking/index');
});

Route::get('user/ranking/all', function() {
	return view('userranking/all');
});

Route::get('user/ranking/game', function() {
	return view('user/ranking/game');
});

Route::get('user/ranking/illust', function() {
	return view('user/ranking/illust');
});

Route::get('user/ranking/it', function() {
	return view('user/ranking/it');
});

Route::get('user/user_questionnaire', function() {
	return redirect('user/questionnaires/user_questionnaire');
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
