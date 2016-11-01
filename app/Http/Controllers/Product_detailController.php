<?php

namespace App\Http\Controllers;
use Illuminate;
use App\Http\Requests;
use App\Product;

class Product_detailController extends Controller
{
	public function index ($id) {
		$ary = Product::findid($id);
		$genre = $ary->genre;
		return view('user/list/detail')->with(compact('ary','genre'));
	}
}