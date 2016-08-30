<?php

namespace App\Http\Controllers;
use Illuminate;
use App\Http\Requests;
use App\questionnaire;

class QuestionnaireController extends Controller
{
	public function index () {
		$ary = questionnaire::quesread(2017);
		return view('questionnaires/questionnaire')->with(compact('ary'));
	}
}