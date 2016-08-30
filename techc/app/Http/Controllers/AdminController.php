<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Questionnaire;
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

    /// 作品詳細画面
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

    /// 会場アンケート一覧
    public function venue()
    {
        $year = 2017;

        $ques = Questionnaire::findYear($year);
        

        // アンケート内容への回答をIDで指定し取得
        $answers = array();
        $i = 0;
        foreach($ques as $key => $val) {
            $answers[$i] = Answer::findIdAnswer($val->id);
            $i++;
        }

        // アンケートの回答数をカウントする配列の初期化
        $answer_count = array();
        foreach($ques as $key)
        {
            if($key->type == "radio")
            {
                $answer_count[$key->id] = array("1"=>0,"2"=>0,"3"=>0,"4"=>0);
            }
            else
            {
                $answer_count[$key->id] = array();
            }
        }

        // アンケートの回答数をカウント
        foreach ($ques as $key => $val) {
            $i=0;
            $answer_id = Answer::findIdAnswer($val->id);
            // アンケートの回答が存在していたら
            if(!empty($answer_id)){
                // 4択回答の処理
                if($val->type == "radio")
                {
                    for($i = 0; $i < count($answer_id); $i++)
                    {
                        $answer_count[$answer_id[$i]->questionnaire_id][$answer_id[$i]->answer]++;
                    }
                }
                // テキスト回答での処理
                elseif($val->type = "text")
                {
                    for($i = 0; $i < count($answer_id); $i++)
                    {
                        /*
                            このarray_pushは新しく$data配列を作成し、そこにIDに紐づく答えの情報を入れ込む
                        */
                        $data = array(
                            "answer" => $answer_id[$i]->answer,
                            "res"    => $answer_id[$i]->respondent,
                            );

                        array_push($answer_count[$answer_id[$i]->questionnaire_id], $data);
                    }
                }
            }
        }
        
        return view('admin.venue')->with(compact('ques', 'answer_count'));
    }

    /// 会場アンケート詳細
    public function venue_detail()
    {
        return view('admin.venue_detail');
    }

    public function create()
    {

        return view('admin.create');
    }

    public function create_conf()
    {
        $ques = array();
        $count = $_POST["count_ques"];
        $date = array("start" => $_POST["start"], "finish" => $_POST["finish"]);

        // postデータを二重配列に変換
        $ques = $this->create_post_ary($ques, $_POST, $count);

        return view('admin.create_conf')->with(compact('ques', 'date'));
    }

    public function create_run()
    {
        $ques = array();
        $count = $_POST["count_ques"];
        // 開催年の取得
        $time_tmp = strtotime($_POST["start"]);
        $year = date('Y', $time_tmp);
        // $date = array("start" => $_POST["start"], "finish" => $_POST["finish"]);

        $ques = $this->create_post_ary($ques, $_POST, $count);

        // データベースへ登録
        if(Questionnaire::createQuestionnaire($ques, $year))
        {
            return redirect('/list');
        }
        else
        {
            return redirect('/create');
        }
    }

    /// postで送られたデータを配列に代入する関数
    /*
        [戻り値]
        送ったpostデータを二重配列で返す

        [引数]
        1. 配列
        2. $postデータ
        3. 質問数
        ※補足
        アンケート作成･アンケート確認で使用
    */
    private function create_post_ary($ary, $post, $count)
    {
        for($i=1; $i <= $count; $i++)
        {
            $content = $_POST["content" . $i];
            $format = $_POST["format" . $i];
            $ary[$i] = array('content' => $content, 'format' => $format);
        }

        return $ary;
    }

    public function edit()
    {
        // サイドバーのリンクから飛んできた場合は今の年+1の年を表示
        // セレクトボックスから選択された場合は、GETで取得
        $year = 0;
        if(!empty($_GET["year"])){
            $year = $_GET['year'];
        }else{
            $year = (int)date('Y') + 1;
        }
        $ques = Questionnaire::findYear($year);

        // view側でのセレクトボックス用
        $year = (int)date('Y') + 1;
        $under_year = 2016;
        $year_list = array($year);

        while($year > $under_year)
        {
            $year--;
            array_push($year_list, $year);
        }
        // ここまでセレクトボックス処理
        
        return view('admin.edit')->with(compact('year_list', 'ques'));
    }
}
