<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Company;
use App\Review;  
use Validator; 
use DB;


class CompaniesController extends Controller
{
    
    //コンストラクタ(このクラスが呼ばれたら最初に処理をする箇所) 
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //共通
    //ダッシュボード表示
    public function index()
    {
        $companies = Company::orderBy('created_at', 'asc')->get();
        return view('companies', [
            'companies' => $companies
        ]);
    }

    //企業詳細画面
    public function overview($id)
    {
        $company = Company::findOrFail($id);
        $reviews = Review::where('company_id', $id)->get();
        
        $reviews_count = count($company->reviews);
        $reviews_sum_work_env_rate = $company->reviews()->sum('work_env_rate');
        $reviews_sum_promotion_rate = $company->reviews()->sum('promotion_rate');
        $reviews_sum_work_life_balance_rate = $company->reviews()->sum('work_life_balance_rate');
        $reviews_sum_growth_rate = $company->reviews()->sum('growth_rate');
        $reviews_sum_c_and_b_rate = $company->reviews()->sum('c_and_b_rate');
        $reviews_sum_gender_equality_rate = $company->reviews()->sum('gender_equality_rate');
        
        if($reviews_count >0){
            $company->ave_score = ($reviews_sum_work_env_rate 
            + $reviews_sum_promotion_rate 
            + $reviews_sum_work_life_balance_rate
            + $reviews_sum_growth_rate
            + $reviews_sum_growth_rate
            + $reviews_sum_gender_equality_rate)/$reviews_count/6;
            $ave_score = round($company->ave_score,2);
            $company->ave_score = 'Score: '.$ave_score.' '.Company::return_stars($ave_score);
        }else{
             $company->ave_score = null;
        }
        
        return view('companyoverview',compact('company','reviews'));
    }
    
    //企業口コミ記載画面
    public function writeareview(Request $request)
    {
        $companies = Company::findOrFail($request->id);
        return view('writeareview', ['company' => $companies]);
    }

    //更新画面
    public function edit(Company $companies)
    {
        return view('companiesedit', ['company' => $companies]);
    }
    
    //更新
    public function update(Request $request) {
        //バリデーション
        $validator = Validator::make($request->all(), [
            // 'id' => 'required',
            'company_name' => 'required|min:3|max:255',
        ]); 
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/admin_companies')->withInput()->withErrors($validator);
        }
        //データ更新
        $companies = Company::find($request->id);
        $companies->company_name = $request->company_name;
        $companies->company_namekana = $request->company_namekana;
        $companies->company_photo = $request->company_photo;
        $companies->company_logo = $request->company_logo;
        $companies->size = $request->size;
        $companies->hqAddress = $request->hqAddress;
        $companies->companyType = $request->companyType;
        $companies->foundedYear = $request->foundedYear;
        $companies->industry = $request->industry;
        $companies->description = $request->description;
        $companies->companyURL = $request->companyURL;
        $companies->save();
        return redirect('/admin_companies');
    }
    
    //登録
    public function store(Request $request) {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',

        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
                return redirect('/admin_companies')->withInput()->withErrors($validator);
        }
        // 作成処理...
        $companies = new Company;
        $companies->company_name = $request->company_name;
        $companies->company_namekana = $request->company_namekana;
        $companies->company_photo = $request->company_photo;
        $companies->company_logo = $request->company_logo;
        $companies->size = $request->size;
        $companies->hqAddress = $request->hqAddress;
        $companies->companyType = $request->companyType;
        $companies->foundedYear = $request->foundedYear;
        $companies->industry = $request->industry;
        $companies->description = $request->description;
        $companies->companyURL = $request->companyURL;
        $companies->save();
        return redirect('/admin_companies');
    }
        
    //削除処理
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/admin_companies');
    }
    
}




