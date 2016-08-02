<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{

	static public function index()
	{
		$table = DB::table('products')->get();

		return $table;
	}


	/// 指定したIDの詳細を取得
	static public function findId($id)
	{
		$product = DB::table('products')
			->where('id', $id)
			->first();

		return $product;
	}

	public function member()
	{
		return $this->hasMany('App\Member');
	}

    public function evaluation()
    {
    	return $this->hasMany('App\Evaluation');
    }
}
