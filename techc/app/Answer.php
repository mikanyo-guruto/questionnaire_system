<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Answer extends Model
{

	static public function index()
	{
		$table = DB::table('answers')
			->join('respondents', 'answers.respondent_id', '=', 'respondents.id')
			->select(
				'answers.questionnaire_id',
				'answers.answer',
				'respondents.respondent'
				)
			->orderBy('answers.create_time', 'desc')
			->get();

		return $table;
	}

	static public function findIdAnswer($id)
	{
		$result = DB::table('answers')
			->join('respondents', 'answers.respondent_id', '=', 'respondents.id')
			->where('questionnaire_id', $id)
			->select('questionnaire_id', 'answer', 'respondents.respondent')
			->get();
		
		return $result;
	}
}
