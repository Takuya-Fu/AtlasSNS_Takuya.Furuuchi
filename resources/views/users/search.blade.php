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
    <p>ここから下は検索結果を表示する</p>
    {{-- 参照元URL　https://qiita.com/mokomokotime_/items/50e137d7609d37ea6245 --}}
    @foreach ($users as $user)
        {{-- UsersControllerのcompact('users')から送信されてきた情報を受け取る --}}
        @if ($user->id !== Auth::user()->id)
            {{-- ユーザーIDがログイン中のIDと一致しなかったら --}}
            <div class="userSearchList">
                <p>{{ $user->username }}</p>
                {{-- ユーザー情報から名前を抽出する --}}
            </div>

            <div class="userSearchButton">
                @if (auth()->user()->isFollowing($user->id))
                    <form action="/users/{{ $user->id }}/unfollow" method="post">
                        @csrf
                        <input type="submit" name="button" class="followButton" value="フォロー解除">
                        {{-- フォロー解除ボタンを表示する --}}
                    </form>
                @else
                    <form action="/users/{{ $user->id }}/follow" method="Ppost">
                        @csrf
                        <input type="submit" name="button" class="followButton" value="フォローする">
                        {{-- フォローボタンを表示する --}}
                    </form>
                @endif
            </div>
        @endif
    @endforeach
