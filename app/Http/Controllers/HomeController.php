<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//使うClassを宣言:自分で追加
use App\Company;   
use App\Review;   

use Validator;  

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //企業の配列を読みこむ
        $companies = Company::orderBy('created_at', 'desc')->get();
        $scores = array();
        $review_counts = array();

        $score = 0;
        $count = 0;

        //企業ごとに口コミの評価の平均を計算する
        foreach ($companies as $company){
            $reviews = Review::where('company_id', $company->id)->get();
            $score = 0;
            $count = 0;
            
            if (count($reviews) > 0){
                foreach($reviews as $review){
                    $score+= $review->work_env_rate;
                    $count++;
                }
                $score = $score/$count;
                round($score,2);
            }else{
                $score = null;
            }
            array_push($scores,$score);
            array_push($review_counts,count($reviews));
        }
        
        return view('home',compact('companies', 'scores', 'review_counts'));

        // return view('home', ['companies' => $companies]);
    }
    
    public function adminindex()
    {
        $companies = Company::orderBy('created_at', 'desc')->get();

        return view('home', [
            'companies' => $companies
        ]);
    }
    

    
}
