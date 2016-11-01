<?php

namespace App\Http\Controllers;
use Illuminate;
use App\Http\Requests;
use App\Questionnaire;

class UserQuestionnaireController extends Controller
{
	public function index () {
		$year = date('Y');
		$ary = Questionnaire::findYear($year);
		
		return view('user/questionnaires/user_questionnaire')->with(compact('ary'));
	}
}