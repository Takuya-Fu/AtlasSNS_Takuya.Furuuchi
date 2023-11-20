{{-- ユーザー検索部分 --}}
{{-- @extends('layouts.login') --}}
@extends('posts.index')
{{-- https://prograshi.com/framework/laravel/extends-section-include-yield/ --}}
{{-- @extendsは「引数でビューファイルを指定することで＜ファイルの中身をそのまま表示させる事＞」 --}}

{{-- @extends('posts.index') --}}
{{-- postsフォルダ内のindex.blade.phpの内容を表示する --}}
@section('content')
    <div id="main" class="main_container">
        <div class="search-wrapper">
            <input class="user_search" type="text" placeholder="ユーザー名" size="100%" height="20%">
            <img class="user_search_icon" src="{{ asset('images/search.png') }}" alt="ユーザーを検索">
        </div>
    </div>
    <h2>ここから下にユーザを表示する（注意書き参照）</h2>
    {{-- やること --}}
    {{-- CRUD部分を復習してマイグレーション操作を行う→DB→DBからデータを引用→DB編集や削除機能を実装する --}}
    {{-- この点を復習しつつ何がしたいかを明確にする --}}
@endsection
