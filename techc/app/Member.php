<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Member extends Model
{
	public function index()
	{
		# code...
	}

	static public function findIdMembers($id)
	{
		$members = DB::table('members')
			->where('product_id', $id)
			->select('name')
			->get();

		return $members;
	}
}
