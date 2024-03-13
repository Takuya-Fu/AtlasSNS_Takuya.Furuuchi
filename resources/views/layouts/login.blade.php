<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- bootstrap --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

{{-- @section('content') --}}

<body>
    <header>
        <div id = "head" class= "header_wrapper">
            <h1><a href="/top"><img class="header_logo" src="{{ asset('images/atlas.png') }}" alt=""></a>
            </h1>
            <div id="head_inner" class="header_inner">
                <div class="header_right">
                    <div id="login_name" class="login_name">
                        @auth
                            <p>{{ Auth::user()->username }}さん</p>
                            {{-- 認証済みのユーザー情報からusernameの値を引用する --}}
                        @endauth
                    </div>
                </div>
                {{-- アコーディオンメニュー部分→head_innerで100%だと同じ広さになるかも --}}
                <nav class="ac-item">
                    <div class="ac__button">
                        <ul class="ac__body hide">
                            @if (Auth::check())
                                <li class="body_inner"><a class="link" href="/top">HOME</a></li>
                                <li class="body_inner"><a class="link" href="/profile">プロフィール編集</a></li>
                                <li class="body_inner"><a class="link" href="{{ route('logout') }}">ログアウト</a></li>
                                                                            {{-- ↑logoutのURIをつけずにログアウト機能を実行する --}}
                            @endif
                        </ul>
                    </div>
                </nav>
                {{-- //アコーディオンメニュー部分 --}}
                <div class="icon_wrapper">
                    <img class="header icon" src="{{ asset('images/icon1.png') }}" alt="icon1">
                </div>
            </div>
        </div>
    </header>
    {{-- @endsection --}}
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar" class="side-bar">
            <div id="confirm">
                @auth
                    <p>{{ Auth::user()->username }}さんの</p>
                    {{-- 認証済みのユーザー情報からusernameの値を引用する --}}
                @endauth
                <div>
                    <p>フォロー数</p>
                    <p>〇〇名</p>
                </div>
                <a href="/follow-list" class="btn btn-primary">フォローリスト</a>
                <div>
                    <p>フォロワー数</p>
                    <p>〇〇名</p>
                </div>
                <a href="/follower-list" class="btn btn-primary">フォロワーリスト</a>
            </div>
            <a href="/search" class="btn btn-primary">ユーザー検索</a>
        </div>
    </div>
    <footer>
        {{-- ＜？ php dd(Auth::user()); ？＞ --}}
        {{-- dd関数を使用して変数内の情報を確認 --}}
    </footer>
    <script src="{{ asset('/js/accordion.js') }}"></script>
</body>

</html>
