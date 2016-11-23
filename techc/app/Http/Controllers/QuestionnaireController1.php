<?php

namespace App\Http\Controllers;
use Illuminate;
use App\Http\Requests;
use App\Questionnaire;

class QuestionnaireController extends Controller
{
	public function index () {
		$year = date('Y');
		$ary = Questionnaire::findYear($year);

		return view('questionnaires/questionnaire',compact('ary'));
	}
}