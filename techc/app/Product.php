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

    static public function detail ($id) {
    	$val = DB::table('products')
            ->where('id',$id)
    		->get();
            
    	return $val;
    }

    static public function genre ($genre) {
        $val = DB::table('products')
            ->where('genre',$genre)
            ->get();

        return $val;
    }

    static public function ranking_genre_all ($genre) {
        $val = DB::table('products')
            ->where('genre',$genre)
            ->orderBy('value','DESC')
            ->take(15)
            ->get();

        return $val;
    }

    static public function ranking_all (){
        $val = DB::table('products')
            ->orderBy('value','DESC')
            ->take(3)
            ->get();

        return $val;
    }

    static public function ranking_synthesis (){
        $val = DB::table('products')
            ->orderBy('value','DESC')
            ->take(15)
            ->get();

        return $val;
    }

    static public function ranking_genre ($genre){
        $val = DB::table('products')
            ->where('genre',$genre)
            ->orderBy('value','DESC')
            ->take(3)
            ->get();

        return $val;
    }
}
