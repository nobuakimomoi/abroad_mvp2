<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//使うClassを宣言:自分で追加
use App\Company;   
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
        $companies = Company::orderBy('created_at', 'desc')->get();

        return view('home', [
            'companies' => $companies
        ]);
    }
    
    public function adminindex()
    {
        $companies = Company::orderBy('created_at', 'desc')->get();

        return view('home', [
            'companies' => $companies
        ]);
    }
    

    
}
