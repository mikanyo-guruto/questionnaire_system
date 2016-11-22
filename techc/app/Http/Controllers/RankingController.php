<?php

namespace App\Http\Controllers;
use Illuminate;
use App\Http\Requests;
use App\Product;

class RankingController extends Controller
{
	public function index (){
		%$ary = Product::
	}

	
	public function ranking_all (){
		$ary = Product::ranking_all();

		var_dump($ary);

		return view('ranking/ranking_all')->with(compact('ary'));
	}

	public function ranking_genre ($genre){
		$ary = Product::ranking_genre($genre);

		return view('ranking/ranking_all')->with(compact('ary','genre'));
	}
}