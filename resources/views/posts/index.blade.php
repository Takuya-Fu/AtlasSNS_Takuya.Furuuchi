@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
{{-- publicフォルダに入っている --}}
<img src="{{ asset('images/icon1.png') }}" alt="icon1">
<input type="text" placeholder="投稿内容を入力して下さい" size="100%">
<img src="{{asset('images/post.png')}}" alt="送信">
@endsection
