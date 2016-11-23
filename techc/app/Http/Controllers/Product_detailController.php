<?php

namespace App\Http\Controllers;
use Illuminate;
use App\Http\Requests;
use App\Product;

class Product_detailController extends Controller
{
	public function index ($id) {
		$ary = Product::detail($id);
		$genre = $ary->genre;

		return view('/user/list/detail', compact('ary' , 'genre'));
	}
}