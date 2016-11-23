<?php

namespace App\Http\Controllers;
use Illuminate;
use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{
	public function genre ($genre) {
		$ary = Product::genre($genre);
		
		return view('user/list/list',compact('ary','genre'));
	}
}