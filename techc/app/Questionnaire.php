<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
	/// 年度を指定しアンケート内容を返す
	static public function findYear($year)
	{
		$val = DB::table('questionnaire')
			->where('year', $year)
			->get();

		return $val;
	}

	/// 新規アンケートを登録する
	static public function createQuestionnaire($ary, $year)
	{
		try
		{
			foreach($ary as $key) {
				DB::table('questionnaire')->insert(
					['content' => $key["content"], 'type' => $key["format"], 'year' => $year]
				);
			}
			return true;
		}
		catch(\exception $e)
		{
			return false;
		}
	}
}
