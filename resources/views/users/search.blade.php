{{-- ユーザー検索部分 --}}
@extends('posts.index')

@section('content')
    {{-- 1.最初にFormタグを作る・2.@csrfのセキュリティ対策 --}}
    <div id="main" class="main_container">
        <div class="search-wrapper">
            <form action="/search" method="POST">
                @csrf
                <input class="user_search" name="keyword" type="search" placeholder="ユーザー名" size="100%" height="20%">
                <button type="submit"><img src="{{ asset('images/search.png') }}" alt="ユーザーを検索"></button>
            </form>
        </div>
    </div>

    {{-- 検索時に入力したワードを表示 --}}
    @if (!empty($keyword))
        <p>検索ワード：{{ $keyword }}は見つかりませんでした</p>
    @endif

    {{-- 自分以外のユーザーのアイコンを表示 --}}
    {{-- 自分以外のユーザー名を表示 --}}


    {{-- フォロー解除・フォローボタンを表示 --}}


@endsection
