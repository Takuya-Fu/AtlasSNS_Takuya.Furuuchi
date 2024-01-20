@extends('layouts.logout')

@section('content')
    {!! Form::open(['url' => '/login', 'method' => 'post']) !!}

    <p>AtlasSNSへようこそ</p>
    @csrf
    {{ Form::label('mail adress') }}
    {{ Form::text('mail', null, ['class' => 'input']) }}
    {{ Form::label('password') }}
    {{ Form::password('password', ['class' => 'input']) }}

    {{ Form::submit('LOGIN') }}

    <p><a href="/register">新規ユーザーの方はこちら</a></p>

    {!! Form::close() !!}
@endsection
