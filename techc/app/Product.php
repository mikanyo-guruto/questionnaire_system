<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

use DB;

class Product extends Model
{
<<<<<<< HEAD
    static public function index () {
    	$val = DB::table('products')
    		->get();
    	
    	return $val;
    }

    static public function detail ($id) {
    	$val = DB::table('products')
            ->where('id',$id)
    		->get();
            
    	return $val;
    }
=======

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
>>>>>>> origin/admin

    static public function genre ($genre) {
        $val = DB::table('products')
            ->where('genre',$genre)
            ->get();

        return $val;
    }
}
