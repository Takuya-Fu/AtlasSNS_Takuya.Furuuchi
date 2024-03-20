@section('sidebar')
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
@endsection
