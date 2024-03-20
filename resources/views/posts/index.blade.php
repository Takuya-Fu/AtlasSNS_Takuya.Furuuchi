{{-- ここは投稿機能です --}}
@extends('layouts.login')
{{-- login.blade.phpの内容を引っ張ってきている→これはこのままで問題ない --}}

{{-- Twitterコメント投稿を行う欄
→0320宮崎さんに質問し「layouts.login.php」を継承して@sectionで囲むことでレイアウトが上下逆に表示されないようになることを確認済み --}}
@section('content')
    <h2>機能を実装していきましょう。</h2>
    <div id="main" class="main_container">
        {{-- 投稿セクション --}}
        <div class="section_post">
            <img src="{{ asset('images/icon1.png') }}" alt="icon1">
            <input class="post" type="comment" placeholder="投稿内容を入力して下さい" size="100%">
            <img class="send_button" src="{{ asset('images/post.png') }}" alt="送信ボタン">
        </div>
    </div>
@endsection
{{-- ここから下にcompact関数でUserモデルから持ってきたデータを表示 --}}
{{-- 持ってきたいデータ
    →フォローしているユーザーでPost投稿されたユーザーの「アイコン・名前・投稿内容・編集ボタン・削除ボタン」を表示する
     その為にはpostsテーブルから「user_id・post・created_at」カラムの内容、usersテーブルから「id・username・images」が必要と判断。
     以下のURLを参照　https://atlas-artlif.com/curriculum/7821/
    --}}
