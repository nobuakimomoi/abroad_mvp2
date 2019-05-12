<!-- resources/views/companies.blade.php -->

@extends('layouts.app')
@section('content')
<div class="container">
        <div class="panel panel-body ç">
            <div class="panel">
            <h3>新規登録</h3>
            <div class="panel-body">
                <!-- バリデーションエラーの表示に使用-->
                @include('common.errors')
                <!-- バリデーションエラーの表示に使用-->
        
            <!-- 企業登録フォーム -->
            <form action="{{ url('companies') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                
                <!-- タイトル -->
                <div class="form-group">
                    <label for="company_name" class="control-label">名前</label>
                    <input type="text" value="Abroad" name="company_name" id="company_namekana" class="form-control">
        
                    <label for="company_namekana" class="control-label">名前カナ</label>
                    <input type="text" value="アブロード" name="company_namekana" id="company-namekana" class="form-control">
                    
                    <label for="company_logo" class="control-label">企業ロゴURL</label>
                    <input type="text" value="http://www.squeeze.com.br/assets/img/sample/woocommerce/img/logo/1.png" name="company_logo" id="company-logo" class="form-control">
                    
                    <label for="hqAddress" class="control-label">本社所在地</label>
                    <input type="text" value="Tokyo, Japan" name="hqAddress" id="company-hqAddress" class="form-control">
                    
                    <label for="industry" class="control-label">業界</label>
                    <input type="text" value="HR" name="industry" id="company-industry" class="form-control">
                    
                    <label for="size" class="control-label">従業員数</label>
                    <input type="number" value="307000" name="size" id="company-size" class="form-control">
                    
                    <label for="size" class="control-label">上場有無</label>
                    <input type="text" value="Yes" name="companyType" id="company-companyType" class="form-control">
                    
                    <label for="foundedYear" class="control-label">創業年</label>
                    <input type="number" value="2018" name="foundedYear" id="company-foundedYear" class="form-control">
                    
                    <!--<dt class="form-title_review check-radio">創業年</dt>-->
                    <!--<dd class="form-item_review">-->
                    <!--    <label for="1950" required><input type="radio" name="foundedYear" id="permanent_employee" value="1950" class="radio_horizontal">1950</label>-->
                    <!--    <label for="2000" required><input type="radio" name="foundedYear" id="contract" value="2000" class="radio_horizontal">2000</label>                            -->
                    <!--</dd>-->
                    
                    <!--<dd class="form-item working_checkbox">-->
                    <!--    <input type="checkbox" name="foundedYear" id="foundedYear">-->
                    <!--</dd>-->
 
                    
                    <label for="description" class="control-label">詳細</label>
                    <input type="text" value="Detail" name="description" id="company-description" class="form-control">
                    
                    <label for="companyURL" class="control-label">URL</label>
                    <input type="text"  value="https://www.ge.com/jp/" name="companyURL" id="company-companyURL" class="form-control">
                </div>
        
                <!-- 企業 登録ボタン -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus"></i> Save
                        </button>
                    </div>
                </div>
            </form>
            
        </div>


         <!-- 現在 企業 -->
         @if (count($companies) > 0)
        <div class="panel panel-default">
            <div class="panel-heading"> 
                現在 企業
            </div>
            <div class="panel-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>企業一覧</th>
                    <th>&nbsp;</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
                     @foreach ($companies as $company)
                        <tr>
                            <!-- 企業タイトル -->
                            <td class="width-70p">
                                <div>{{ $company->company_name }}</div>
                            </td>
                            
                            <!-- 更新ボタン -->
                            <td>
                                <form action="{{ url('companiesedit/'.$company->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-pencil"></i> 更新
                                    </button>
                                </form>
                            </td>
                            
                            <!-- 削除ボタン -->
                            <td>
                                <form action="{{ url('company/delete/'.$company->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i> 削除
                                    </button>
                                </form>
                            </td>
                            
                            
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
        </div>
        @endif
    <!--  ook: 既に登録されてる企業 リスト -->
   
    </div>
</div>
@endsection




