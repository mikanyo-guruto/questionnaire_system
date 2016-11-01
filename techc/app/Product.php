<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    static public function index () {
    	$val = DB::table('products')
    		->get();
    	
    	return $val;
    }

	/// 指定したIDの詳細を取得
	static public function findId($id)
	{
		$product = DB::table('products')
			->where('id', $id)
			->first();

		return $product;
	}

    static public function genre ($genre) {
        $val = DB::table('products')
            ->where('genre',$genre)
            ->get();

        return $val;
    }
}
