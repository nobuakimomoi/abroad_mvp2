@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default margin-top">
                <div class="panel-heading">UserList</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>ユーザー名</th>
                        <th>アドレス</th>
                    </thead>

                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="width-30p">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <!-- 更新ボタン -->
                                <!--<td>-->
                                <!--    <form action="" method="POST">-->
                                <!--    {{ csrf_field() }}-->
                                <!--    <button type="submit" class="btn btn-default">詳細</button>-->
                                <!--    </form>-->
                                <!--</td>-->
                                <!-- 削除ボタン -->
                                <td>
                                    <form action="" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    
    
    
</div>
@endsection
