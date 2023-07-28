@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{{-- 0726ログインまたは新規登録ページ --}}
{!! Form::open(['url' => '/login']) !!}
{{-- 0727入力、ログイン用URL --}}

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
