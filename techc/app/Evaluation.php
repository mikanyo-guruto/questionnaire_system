<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{

	/// 指定したIDにされている評価を全て取得
	static public function findIdEvals($id)
	{
		$evals = DB::table('evaluations')
			->where('product_id', $id)
			->select('age_group', 'gender', 'impression', 'create_time')
			->get();

		return $evals;
	}
}
