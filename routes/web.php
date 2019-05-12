<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Book;
use App\Company;
use App\Review;
use App\User;
use Illuminate\Http\Request; 


//--------------------User
Auth::routes();
// Route::get('/home', ' BooksController@index')->name('home');
// Route::get('/home', 'HomeController@index');

//Top表示
Route::get('/', 'HomeController@index');
//企業概要表示
Route::get('/companyoverview/{company_id}','CompaniesController@overview');
//レビューフォーム表示
Route::post('/reviewform/{company_id}','CompaniesController@writeareview');
// Route::get('/reviewform','CompaniesController@writeareview');

//レビュー登録処理
Route::post('/reviews','ReviewsController@store');


//--------------------Admin
//ユーザリスト表示
Route::get('/admin_users', 'UserController@index');
//企業リスト表示
Route::get('/admin_companies', 'CompaniesController@index');
//企業ダッシュボード表示
Route::get('/companyregist', 'CompaniesController@regist');
//企業登録処理
Route::post('/companies','CompaniesController@store');
//企業編集画面
Route::post('/companiesedit/{companies}','CompaniesController@edit');
//企業更新処理
Route::post('/companies/update','CompaniesController@update');
//企業削除
Route::post('/company/delete/{company}','CompaniesController@destroy');
//レビュー表示
Route::get('/admin_reviews', 'ReviewsController@index');
//レビュー削除
Route::post('/review/delete/{review}','ReviewsController@destroy');



//--------------------本
//本 ダッシュボード表示
Route::get('/booklists','BooksController@index');
//本 ダッシュボード表示
Route::get('/bookregist', 'BooksController@regist');
//登録処理
Route::post('/books','BooksController@store');
//更新画面
Route::post('/booksedit/{books}','BooksController@edit');
//更新処理
Route::post('/books/update','BooksController@update');
//本を削除
Route::post('/book/delete/{book}','BooksController@destroy');

?>