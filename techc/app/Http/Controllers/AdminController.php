<?php

namespace App\Http\Controllers;

use App\Product;
use App\Member;
use App\Evaluation;
use Illuminate;
use App\Http\Requests;

class AdminController extends Controller
{

    public function getIndex()
    {
        $lists = Product::index();

    	return view('admin.list')->with(compact('lists'));
    }

    public function detail($id)
    {
        $product = Product::findId($id);
    	$members = Member::findIdMembers($id);
        $evals = Evaluation::findIdEvals($id);

        $age = array("10"=>0, "20"=>0, "30"=>0, "40"=>0, "その他"=>0);
        $gender = array("0"=>0, "1"=>0);

        // 評価した年齢と性別の計算
        foreach ($evals as $key) {
            // 年齢の合計を計算
            if($key->age_group >= 1 && $key->age_group <= 4){
                $age[$key->age_group*10]++;
            }
            else
            {
                $age["その他"]++;
            }

            // 性別の合計を計算
            $gender[$key->gender]++;
        }

    	return view('admin.detail')->with(compact(
            'product', 'members', 'age', 'gender', 'evals'));
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
