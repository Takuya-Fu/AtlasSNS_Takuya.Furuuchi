{{-- ユーザー検索部分 --}}
@extends('posts.index')
@section('content')
    <div id="main" class="main_container">
        <div class="search-wrapper">
            <input class="user_search" type="text" placeholder="ユーザー名" size="100%" height="20%">
            <img class="user_search_icon" src="{{ asset('images/search.png') }}" alt="ユーザーを検索">
        </div>
    </div>
@endsection