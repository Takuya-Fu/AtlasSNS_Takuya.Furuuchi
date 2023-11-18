{{-- @extends('layouts.login') --}}
@extends('posts.index')
{{-- https://prograshi.com/framework/laravel/extends-section-include-yield/ --}}
{{-- @extendsは「引数でビューファイルを指定することで＜ファイルの中身をそのまま表示させる事＞」 --}}

{{-- @extends('posts.index') --}}
{{-- postsフォルダ内のindex.blade.phpの内容を表示する --}}
@section('content')
    {{-- contentとして変数にデータを渡す部分のこと --}}
    <h2>ユーザー検索</h2>
    <div id="main" class="main_container">
        <input class="post" type="text" placeholder="ユーザー名" size="100%" height="20%">
    </div>
@endsection
