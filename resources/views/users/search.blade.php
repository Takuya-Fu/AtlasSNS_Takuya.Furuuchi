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

<h2>ここから下にユーザを表示する（注意書き参照）</h2>
{{-- コードのみ --}}
@foreach ($users as $user)
@if ($user->id !== Auth::user()->id);
<div class="userSearchList">
    <figure><img src="images/{{$user->images}}"></figure>
    <p>{{$user->username}}</p>
</div>
<div class="userSearchButton">
    @if (auth()->user()->isFollowing($user->id))
<form action="/users/{{ $user->id }}/unfollow" method="post">
    @csrf
    <input type="submit" name="button" class="followButton" value="フォロー解除">
</form>
    @else
<form action="/users/{{ $user->id }}/follow" method="post">
    @csrf
    <input type="submit" name="button" class="followButton" value="フォローする">
</form>
    @endif
</div>
@endif
@endforeach



{{-- 目的 --}}
{{-- ①自分以外のユーザーを表示させたい --}}
{{-- ②フォローボタンとフォロー解除ボタンを設置したい --}}
{{-- @foreach ($users as $user)
@if ($user->id !== Auth::user()->id); --}}
{{-- ↑もしも、ログインしているユーザーと一致しないIDの場合は以下の動作を行う --}}
{{-- <div class="userSearchList">
    <figure><img src="images/{{$user->images}}"></figure> --}}
    {{-- ↑userプロフィール画像を表示する --}}
    {{-- <p>{{$user->username}}</p>
</div>
<div class="userSearchButton">
    @if (auth()->user()->isFollowing($user->id)) --}}
{{-- ↑もしも、ログインユーザーにフォローされているユーザーがいた場合 --}}
{{-- ↓送信するためのアクション→ここはどこに連携するか調べて書き直す！！ --}}
{{-- <form action="/users/{{ $user->id }}/unfollow" method="post">
    @csrf
    <input type="submit" name="button" class="followButton" value="フォロー解除">
</form> --}}
    {{-- @else --}}
{{-- ↑条件一致しない場合 --}}
{{-- <form action="/users/{{ $user->id }}/follow" method="post">
    @csrf
    <input type="submit" name="button" class="followButton" value="フォローする">
</form>
    @endif
</div>
@endif
@endforeach --}}

