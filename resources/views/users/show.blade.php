{{-- 0122作成中 --}}

@extends('layouts.login')
{{-- ↑login.blade.phpの内容を引っ張ってきている --}}

@section('content')
    <h2>機能を実装していきましょう。</h2>
    {{-- publicフォルダに入っている --}}
    <div id="main" class="main_container">
        {{-- 投稿セクション --}}
        <div class="section_post">
            <img src="{{ asset('images/icon1.png') }}" alt="icon1">
            <input class="post" type="comment" placeholder="投稿内容を入力して下さい" size="100%">
            {{-- <textarea name="comment"  cols="100%" rows="5%"> --}}
            <img class="send_button" src="{{ asset('images/post.png') }}" alt="送信ボタン">
        </div>
    </div>
@endsection