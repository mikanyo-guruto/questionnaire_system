<?php

namespace App\Http\Controllers;
use Illuminate;
use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{
	public function genre ($genre) {
		$ary = Product::genre($genre);

		return view('user/list/list')->with(compact('ary','genre'));
	}
}