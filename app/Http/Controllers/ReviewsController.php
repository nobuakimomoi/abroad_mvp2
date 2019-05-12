<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


//使うClassを宣言:自分で追加
use App\Review;
use App\Company;   
use Validator;  


class ReviewsController extends Controller
{
    
    //コンストラクタ(このクラスが呼ばれたら最初に処理をする箇所) 
    public function __construct()
    {
        $this->middleware('auth');
    }

    //レビューダッシュボード表示
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'asc')->get();
        return view('reviews', ['reviews' => $reviews]);
        // return view('reviews');

    }
    

    //更新画面
    public function edit(Review $reviews)
    {
        return view('reviewsedit', [
            'review' => $reviews
        ]);
    }
    
    //更新
    public function update(Request $request) {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'item_name' => 'required|min:3|max:255',
            'item_number' => 'required|min:1|max:3',
            'item_amount' => 'required|max:6',
            'published' => 'required',
        ]); 
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')->withInput()->withErrors($validator);
        }
        $reviews = Review::find($request->id);
        $reviews->item_name   = $request->item_name;
        $reviews->item_number = $request->item_number;
        $reviews->item_amount = $request->item_amount;
        $reviews->published   = $request->published;
        $reviews->save();
        return redirect('/');
    }
    
    //登録
    public function store(Request $request) {
        //バリデーション 必要に応じて書く
        $validator = Validator::make($request->all(), [
                // 'company_name' => 'required',
                // 'company_id' => 'required',
                // 'user_id' => 'required',
                // 'employment_condition' => 'required',
                // 'enrollment_status' => 'required',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
                return redirect('/reviewform/'.$request->company_id)->withInput()->withErrors($validator);
        }
        // レビュー作成処理...
        $reviews = new Review;
        $reviews->company_name = $request->company_name;
        $reviews->company_id = $request->company_id;
        $reviews->user_id = $request->user_id;
        $reviews->employment_condition = $request->employment_condition;
        $reviews->enrollment_status = $request->enrollment_status;
        $reviews->work_env_rate = $request->work_env_rate;
        $reviews->work_env = $request->work_env;
        $reviews->save();
        return redirect('/');
    }
        
    //削除処理
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect('/');
    }
    
}




