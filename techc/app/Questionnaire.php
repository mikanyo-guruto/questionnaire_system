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
}
