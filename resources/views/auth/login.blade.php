@extends('layouts.logout')
{{-- logout.blade.phpの内容を継承する --}}

@section('content')
{{-- contentに代入する値を設定する。 --}}

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login','method'=> 'post']) !!}
{{-- 0727入力、ログイン用URL --}}

<p>AtlasSNSへようこそ</p>
{{-- @csrf --}}
{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
