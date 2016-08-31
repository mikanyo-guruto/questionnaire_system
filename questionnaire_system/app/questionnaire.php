<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Questionnaire extends Model
{
	static public function quesread ($year) {
		$val = DB::table('questionnaire')
			->where('year',$year)
			->get();

  		return $val;
	}
}
