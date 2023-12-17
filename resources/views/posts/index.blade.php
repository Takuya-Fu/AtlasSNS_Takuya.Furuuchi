@extends('layouts.login')

@section('content')
    {{-- <h2>機能を実装していきましょう。</h2> --}}
    {{-- publicフォルダに入っている --}}
    <div id="main" class="main_container">
        {{-- 投稿セクション --}}
        <div class="section_post">
            <img src="{{ asset('images/icon1.png') }}" alt="icon1">
            <input class="post" type="text" placeholder="投稿内容を入力して下さい" size="100%">
            <img class="send_button" src="{{ asset('images/post.png') }}" alt="送信ボタン">
        </div>
        {{-- 投稿内容表示部分 --}}
    </div>
@endsection
{{-- フォローされているかの判定 --}}
{{-- @if (auth()->user()->isFollowed($user->id)) --}}

{{-- フォローしているかの判定 --}}
{{-- @if (auth()->user()->isFollowing($user->id)) --}}
