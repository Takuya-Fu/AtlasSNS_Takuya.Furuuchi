{{-- 新規ユーザー登録画面 --}}
@extends('layouts.logout')

@section('content')
{!! Form::open(['url' => '/register','method'=>'post']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input','id'=>'UserName','placeholder'=>'ユーザー名']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input','id'=>'MailAdress','placeholder'=>'メールアドレス']) }}

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input','id'=>'Password']) }}

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input','id'=>'PasswordConfirm
']) }}
{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
