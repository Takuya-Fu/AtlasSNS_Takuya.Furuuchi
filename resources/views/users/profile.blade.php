@extends('layouts.login')

@section('content')
<h2>プロフィール画面</h2>


<div class="my-profile">
    {{-- メールアドレス --}}
    <label>mail adress</label><br>
        <input type="email" id="mail-address"><br>
        {{-- パスワード→伏字にする --}}
    <label>password</label><br>
        <input type="password" id="password"><br>
            {{-- パスワード確認用→伏字にする --}}
    <label>password comfirm</label><br>
        <input type="password" id="password comfirm"><br>
        {{-- 自己紹介文 --}}
    <label>bio</label><br>
        <input type="text" id="mail-address"><br>
        {{-- アイコン用の画像アップロードする（任意） --}}
    <label>icon image</label><br>
        <input type="file" id="mail-address" accept=".png,.jpg,.jpeg,.pdf,gif"><br>
</div>
@endsection