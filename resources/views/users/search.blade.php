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
@endsection
