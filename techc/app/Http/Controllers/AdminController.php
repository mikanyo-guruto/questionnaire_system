<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate;
use App\Http\Requests;

class AdminController extends Controller
{
    protected $lists;
    protected $members;

    public function __construct(Product $product)
    {
        $this->lists = $product;
    }

    public function getIndex()
    {
        $lists = Product::with('member', 'evaluation')->get();

        /*
            評価数の合計を求める
        */
        $sum_val[] = 0;

        foreach($lists as $list){
            $sum_val += array($list->id => 0);
            foreach($list->evaluation as $eva){
                $sum_val[$eva->product_id] += $eva->value;
            }
        }

    	return view('admin.list')->with(compact('lists', 'sum_val'));
    }

    public function detail($id)
    {
        $lists = Product::find($id);
    	$members = Product::find($id)->member;
        $evaluation = Product::find($id)->evaluation;

        /*
            val_sum ･･･ 評価数の合計
            age_sum ･･･ 年齢層の合計
                0=10代, 1=20代... +1を忘れずに
            gen_sum ･･･ 性別の合計
        */
        
        $sum_val = 0;
        $sum_age = array('0'=>0, '1'=>0, '2'=>0, '3'=>0, '4'=>0);
        $sum_gen = array('man'=>0, 'woman'=>0);

        //それぞれの合計を求める
        foreach($evaluation as $val){
            $sum_val += $val->value;
            $sum_age[$val->age_group]++;
            if ($val->gender == 0) {
                $sum_gen['man']++;
            }else{
                $sum_gen['woman']++;
            }
        }

    	return view('admin.detail')->with(
            compact('lists', 'members', 'evaluation', 'sum_val', 'sum_age', 'sum_gen'));
    }

    public function venue()
    {
        return view('admin.venue');
    }

    public function venue_detail()
    {
        return view('admin.venue_detail');
    }

    public function questionnaire_edit()
    {
        return view('admin.questionnaire_edit');
    }
}
