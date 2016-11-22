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

Route::get('/questionnaires/questionnaire', 'QuestionnaireController@index');

Route::get('/list/detail/{id}', 'Product_detailController@index');

Route::get('/ranking/ranking_all', 'RankingController@ranking_all');

Route::get('/ranking/synthesis', function() {
	return view('ranking/synthesis');
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