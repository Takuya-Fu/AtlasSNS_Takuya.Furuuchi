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
            <div class="search_result">
                <h4>ここには検索結果を表示する</h4>
                {{-- キーワード検索で一致しなかった場合→検索ワード：〇〇は見つかりませんでしたと表示 --}}
                @if (!empty($keyword))
                    <p>検索ワード：{{ $keyword }}は見つかりませんでした</p>
                    {{-- 検索で一致した場合→以下にユーザーのアイコン・ユーザー名・フォローボタンを表示する --}}
                    {{-- @elseif ($keyword = ) --}}
                @endif
            </div>
        </div>
    </div>
    <p>ここから下は検索結果を表示する</p>
    {{-- 自分以外のユーザーのアイコンを表示→foreachタグで表示する --}}
    @foreach ($users as $user)
        <div class="user_list">
            <ul>
                <li>{{ $user->images }}</li>
                <li>{{ $user->mail }}</li>
            </ul>
        </div>
    @endforeach
    {{-- 自分以外のユーザー名を表示→foreachタグで表示する --}}

    {{-- フォロー解除・フォローボタンを表示→リレーション機能を実施する --}}
@endsection
