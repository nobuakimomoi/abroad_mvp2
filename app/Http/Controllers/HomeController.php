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
    DB::raw('(SELECT SUM(work_env_rate) FROM reviews WHERE companies.id = reviews.company_id) as reviews_sum_work_env_rate'),
    DB::raw('(SELECT SUM(promotion_rate) FROM reviews WHERE companies.id = reviews.company_id) as reviews_sum_promotion_rate'),
    DB::raw('(SELECT SUM(work_life_balance_rate) FROM reviews WHERE companies.id = reviews.company_id) as reviews_sum_work_life_balance_rate'),
    DB::raw('(SELECT SUM(growth_rate) FROM reviews WHERE companies.id = reviews.company_id) as reviews_sum_growth_rate'),
    DB::raw('(SELECT SUM(c_and_b_rate) FROM reviews WHERE companies.id = reviews.company_id) as reviews_sum_c_and_b_rate'),
    DB::raw('(SELECT SUM(gender_equality_rate) FROM reviews WHERE companies.id = reviews.company_id) as reviews_sum_gender_equality_rate')
    )
    -> orderBy('created_at', 'desc')->get();



    foreach($companies as $company) {
        // $reviews_count = $company->reviews_count;
        $company->reviews_counts = 0;

        foreach($company->reviews as $review){
            if ($review->work_env != null){$company->reviews_counts +=1;}
            if ($review->screening != null){$company->reviews_counts +=1;}
            if ($review->promotion != null){$company->reviews_counts +=1;}
            if ($review->growth != null){$company->reviews_counts +=1;}
            if ($review->gender_equality != null){$company->reviews_counts +=1;}
            if ($review->c_and_b != null){$company->reviews_counts +=1;}
        } 
        
        $reviews_sum_work_env_rate = $company->reviews_sum_work_env_rate;
        $reviews_sum_promotion_rate = $company->reviews_sum_promotion_rate;
        $reviews_sum_work_life_balance_rate = $company->reviews_sum_work_life_balance_rate;
        $reviews_sum_growth_rate = $company->reviews_sum_growth_rate;
        $reviews_sum_c_and_b_rate = $company->reviews_sum_c_and_b_rate;
        $reviews_sum_gender_equality_rate = $company->reviews_sum_gender_equality_rate;
    }
    
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
