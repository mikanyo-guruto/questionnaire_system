<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class questionnaire extends Model
{
	static public function quesread ($year) {
		$val = DB::table('questionnaire')
			->where('year',$year)
			->select('content')
			->get();

  		return $val;
	}
}
