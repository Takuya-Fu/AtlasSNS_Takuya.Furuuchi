@extends('layouts.login')

@section('content')
    <h2>Follow List</h2>
    {{-- ↓ここにフォローしたユーザーを表示させる --}}
    {{-- @foreach ($users as $user)
        @if (in_array($user->id, Auth::user()->follow_each))

        @endif
    @endforeach --}}
@endsection
