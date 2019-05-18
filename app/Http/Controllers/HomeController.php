<?php
namespace App\Http\Controllers;
use DB;
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
        
    $companies = Company::withCount('reviews')->select(
    'companies.*',
    DB::raw('(SELECT COUNT(id) FROM reviews WHERE companies.id = reviews.company_id) as reviews_count'),
    DB::raw('(SELECT SUM(work_env_rate) FROM reviews WHERE companies.id = reviews.company_id) as reviews_sum_rate'))
    -> orderBy('created_at', 'desc')->get();

    foreach($companies as $company) {
      $reviews_count = $company->reviews_count;
      $reviews_sum_rate = $company->reviews_sum_rate;
    }
    
    $reviews_count = $company->reviews_count;
    $reviews_sum_rate = $company->reviews_sum_rate;
    return view('home', compact('companies'));

    }
    
    public function adminindex()
    {
        $companies = Company::orderBy('created_at', 'desc')->get();

        return view('home', [
            'companies' => $companies
        ]);
    }
    

    
}
