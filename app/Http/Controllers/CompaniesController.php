<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Company;
use App\Review;  
use Validator;  


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
        //企業名を探す
        $company = Company::findOrFail($id);
        //口コミを探す
        $reviews = Review::where('company_id', $id)->get();
        
        return view('companyoverview',compact('company','reviews'));
        // return view('companyoverview', ['company' => $companies], ['review' => $reviews]);
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




