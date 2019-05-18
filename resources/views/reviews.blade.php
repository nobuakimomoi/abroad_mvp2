<!-- resources/views/companies.blade.php -->

@extends('layouts.app')
@section('content')
<div class="container">
         <!-- 現在  -->
        <div class="panel panel-default margin-top">
            <div class="panel-heading"> 
                レビュー　一覧
            </div>
            <div class="panel-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                    <tr>
                        <th>id</th>
                        <th>company_name</th>
                        <th>company_id</th>
                        <th>user_id</th>
                        <th>employment_condition</th>
                        <th>enrollment_status</th>
                        <th>work_env_rate</th>
                        <td>promotion_rate</td>
                        <td>work_life_balance_rate</td>
                        <td>c_and_b_rate</td>
                        <td>gender_equality_rate</td>
                        <td>growth_rate</td>
                        <th>work_env</th>
                        <th>delete</th>
                    </tr>
        @if (count($reviews) > 0)
                <!-- テーブル本体 -->
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                             <!-- 企業タイトル -->
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->company_name }}</td>
                            <td>{{ $review->company_id }}</td>
                            <!--$users = Auth::findOrFail($review->user_id);-->
                            <!--<td>"{{ Auth::user()->id }}" {{ $review->user_id }}</td>-->
                            <td>{{ $review->user_id }}</td>
                            <td>{{ $review->employment_condition }}</td>
                            <td>{{ $review->enrollment_status }}</td>
                            <td>{{ $review->work_env_rate }}</td>
                            <td>{{ $review->promotion_rate }}</td>
                            <td>{{ $review->work_life_balance_rate }}</td>
                            <td>{{ $review->c_and_b_rate }}</td>
                            <td>{{ $review->gender_equality_rate }}</td>
                            <td>{{ $review->growth_rate }}</td>
                            <td class="width-30p">{{ $review->work_env }}</td>

                            <!-- 削除ボタン -->
                            <td>
                                <form action="{{ url('review/delete/'.$review->id) }}" method="POST">
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
    <!--  ook:  -->
   
    </div>
</div>
@endsection




