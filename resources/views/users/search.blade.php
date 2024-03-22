{{-- ユーザー検索部分 --}}
{{-- @yield('content')
@extends('layouts.login') --}}
@extends('posts.index')
{{-- ↑投稿部分を引き継ぎ、表示されている。 --}}
{{-- 1.最初にFormタグを作る・2.@csrfのセキュリティ対策 --}}
@section('content')
    {{-- @section('content')をつけることで以下の内容が上に表示されなくなる --}}
    <div id="main" class="main_container">
        <div class="search-wrapper">
            <form action="/search" method="POST">
                @csrf
                <input class="user_search" name="keyword" type="search" placeholder="ユーザー名" size="100%" height="20%">
                <button type="submit"><img src="{{ asset('images/search.png') }}" alt="ユーザーを検索"></button>
            </form>
        </div>
    </div>
    <p>ここから下は検索結果を表示する。</p>
    <p>表示させるデータはUsersテーブルの「images・usernameとフォローorフォロー解除ボタン」</p>
    {{-- 0322ユーザー情報を表示させたい --}}
    @foreach ($users as $user)
    {{-- UserContoroller内の$usersを$userに変換して値を表示させる --}}
    <p>{{ $user->images }}</p>
    <p>名前：{{ $user->username }}</p>
    {{-- ここに投稿した内容を表示させる→post投稿用のseederが必要かも --}}
    @endforeach
@endsection
