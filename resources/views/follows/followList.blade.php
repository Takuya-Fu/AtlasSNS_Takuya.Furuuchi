@extends('layouts.login')
{{-- 完成品　https://xd.adobe.com/view/0c9134dc-3528-4b4d-5c2a-b892202aa207-7aa0/screen/65f4e60b-6b17-4e39-a339-fe432bc03501?hints=off --}}
@section('content')
    <h2>フォローリスト</h2>
    {{-- ↓ここにフォローしたユーザーを表示させる --}}
    {{-- @foreach ($users as $user)
        @if (in_array($user->id, Auth::user()->follow_each))

        @endif
    @endforeach --}}
@endsection
