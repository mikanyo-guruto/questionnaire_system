<?php

namespace App\Http\Controllers;
use Illuminate;
use App\Http\Requests;
use App\Product;

class RankingController extends Controller
{
	public function index (){
		$all = Product::ranking_all();
		$ranking_illust = Product::ranking_genre("illust");
		$ranking_game = Product::ranking_genre("game");
		$ranking_it = Product::ranking_genre("it");

		return view('user/ranking/ranking_all',compact('all','ranking_illust','ranking_game','ranking_it'));
	}

	public function top (){
		$ary = Product::ranking_all();

		return view('index',compact('ary'));
	}

	public function ranking_all (){
		$ary = Product::ranking_all();

		return view('ranking/ranking_all',compact('ary'));
	}

	public function ranking_synthesis (){
		$ary = Product::ranking_synthesis();

		return view('user/ranking/synthesis',compact('ary'));
	}

	public function ranking_genre_all ($genre){
		$ary = Product::ranking_genre_all($genre);

		return view('user/ranking/ranking_genre',compact('ary','genre'));
	}
}