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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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

<body>
    <header>
        <div id = "head" class= "header_wrapper">
            <h1><a href="/top"><img class="header_logo" src="{{ asset('images/atlas.png') }}" alt=""></a>
            </h1>
            <div id="head_inner" class="header_inner">
                <div class="header_right">
                    <div id="login_name" class="login_name">
                        <p>〇〇さん</p>
                    </div>
                </div>
                {{-- アコーディオンメニュー部分→head_innerで100%だと同じ広さになるかも --}}
                <nav class="ac-item">
                    <div class="ac__button">
                        <ul class="ac__body hide">
                            <li class="body_inner"><a class="link" href="/top">HOME</a></li>
                            <li class="body_inner"><a class="link" href="/profile">プロフィール編集</a></li>
                            <li class="body_inner"><a class="link" href="/logout">ログアウト</a></li>
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
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        {{-- 右側のフォロー人数を表示する --}}
        <div id="side-bar" class="side-bar">
            <div id="confirm">
                <p>〇〇さんの</p>
                <div>
                    <p>フォロー数</p>
                    <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォローリスト</a></p>
                <div>
                    <p>フォロワー数</p>
                    <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('/js/accordion.js') }}"></script>

</body>

</html>
