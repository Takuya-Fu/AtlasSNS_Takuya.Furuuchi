{{-- 登録完了後の画面 --}}
@extends('layouts.logout')
{{-- logout.blade.phpの内容を引用してくる --}}

@section('content')
    <div id="clear">
        {{-- <p>〇〇さん</p> --}}
        <p>{{ $UserName }}さん</p>
        <p><?php $username = Auth::user(); ?> {{ $UserName->name }}さん</p>
        <p>ようこそ！AtlasSNSへ！</p>
        <p>ユーザー登録が完了しました。</p>
        <p>早速ログインをしてみましょう。</p>
        <p class="btn"><a href="/login">ログイン画面へ</a></p>
    </div>
@endsection
