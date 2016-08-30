<?php

namespace App\Http\Controllers;
use Illuminate;
use App\Http\Requests;
use App\questionnaire;

class QuestionnaireController extends Controller
{
	public function index () {
		$year = date('Y');
		$ary = questionnaire::quesread($year);

		return view('questionnaires/questionnaire')->with(compact('ary'));
	}
}