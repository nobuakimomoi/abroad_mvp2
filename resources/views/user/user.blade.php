@extends('...layouts.layout')

@section('user_index')
    ユーザー一覧<br>
    <table>
        <tr><th>ユーザーID</th><th>名前</th></tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
        </tr>
    @endforeach
    </table>
@endsection