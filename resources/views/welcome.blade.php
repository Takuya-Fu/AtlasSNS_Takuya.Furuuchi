{{-- Laravelとトップページ画面 --}}
<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    {{-- bootstrap --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('home') }}">Home</a>
                    {{-- ログイン時（ユーザー認証済み）に表示する --}}
                @else
                    <a href="{{ route('login') }}">Login</a>
                    {{-- authフォルダ内のlogin.blade.phpにアクセスする --}}
                    <a href="{{ route('register') }}">Register</a>
                    {{-- authフォルダ内のregister.blade.phpにアクセスする --}}
                    {{-- ログインしていない（ユーザー未認証）に表示する --}}
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Documentation</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
                {{-- 以下は自分オリジナル→ただの便利機能なのでログイン機能が完成したら消す --}}
            </div>
            {{-- bootstrapテスト表示用 --}}
            {{-- <div class="bootstrap">
                <a href="https://laravel.com/docs"><button class='btn btn-default'>Docs</button></a>
                <a href="https://laracasts.com"><button class='btn btn-primary'>Laracasts</button></a>
                <a href="https://laravel-news.com"><button class='btn btn-success'>News</button></a>
                <a href="https://blog.laravel.com"><button class='btn btn-info'>Blog</button></a>
                <a href="https://nova.laravel.com"><button class='btn btn-warning'>Nova</button></a>
                <a href="https://forge.laravel.com"><button class='btn btn-danger'>Forge</button></a>
                <a href="https://vapor.laravel.com"><button class='btn btn-link'>Vapor</button></a>
                <a href="https://github.com/laravel/laravel"><button class='btn btn-primary'>GitHub</button></a>
            </div> --}}
        </div>
    </div>
</body>

</html>
