{{-- ユーザー検索部分 --}}
{{-- ＜☆作成中☆→ユーザー検索＞
 ユーザー検索ボタンを押下したら「自分以外のユーザーが全て表示されている状態にする」
・ユーザーアイコン
・ユーザー名
・フォロー登録ボタン/フォロー解除ボタンを設置
--}}
@extends('posts.index')
@section('content')
    <div id="main" class="main_container">
        <div class="search-wrapper">
            <input class="user_search" type="text" placeholder="ユーザー名" size="100%" height="20%">
            {{-- 以下はモデル機能を使い、DBからデータを取得する --}}
            {{-- ユーザーアイコンを表示する --}}
            <img class="user_search_icon" src="{{ asset('images/search.png') }}" alt="ユーザーを検索">
            {{-- ユーザー名を表示する --}}
            
            {{-- フォロー登録ボタン/フォロー解除ボタンを設置する --}}

        </div>
    </div>
@endsection
