@extends('layouts.login')
use App
@section('content')
    <ol>
        <li>1.自分以外のユーザープロフィール画像を表示させる</li>
        <li>2.ユーザー名</li>
        <li>3.フォローする・しないボタン</li>
    </ol>
    <p>この３つを呼び出したい</p>
    <style>
        ol{
            padding-left: 20px;
        }
    </style>
    <h2>ここから記述</h2>
    {{-- フォローリスト --}}
    <h2>Follow List</h2>
    {{-- フォローアイコンを取得 --}}
    {{-- <div class="follow-icon">
        @foreach ($followings as $following){
            <a><img src="{{ asset('storage/app/public'.$following->images) }}" alt="フォローアイコン"></a>
        @endforeach
        }
    </div>
    @foreach($posts as $post)
        <p>名前：{{ $post->user->'username' }}</p>
        <p>投稿内容：{{ $post->post }}</p>
    @endforeach --}}
    {{-- ＜練習→IDを取得して順番に並べる＞ --}}
    @foreach ($users as $user)
        {{-- ↑usersクラスの要素を --}}
        <table>
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->mail}}</td>
            </tr>
        </table>
    @endforeach
@endsection
