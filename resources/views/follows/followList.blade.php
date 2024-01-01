@extends('layouts.login')
@section('content')
    <ol>
        <li>1.自分以外のユーザープロフィール画像を表示させる</li>
        <li>2.ユーザー名</li>
        <li>3.フォローする・しないボタン</li>
    </ol>
    <p>この３つを呼び出したい</p>
    <style>
        ol{
            padding-left: 20px;
        }
    </style>
    {{-- フォローリスト --}}
    <h2>Follow List</h2>
@endsection
