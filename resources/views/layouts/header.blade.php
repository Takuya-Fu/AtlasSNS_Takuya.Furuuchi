@section('header')
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
@endsection
