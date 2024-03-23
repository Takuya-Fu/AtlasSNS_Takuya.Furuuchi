<?php

namespace App\Http\Controllers;

class PostsController extends Controller
/*　投稿された時のコントローラー　*/
{
    public function index()
    {
        return view('posts.index');
        // viewsフォルダ内のpostsフォルダ以下の階層のindex.blade.phpを参照する
    }
    // フォローリスト　followList
    public function followList()
    {
        // $users = User::get();
        return view('follows.followList');
    }
    // フォロワーリスト　followerList
    public function followerList()
    {
        return view('follows.followerList');
    }
    // ユーザー検索
    public function search()
    {
        return view('users.search');
    }
    /*　フォローしているユーザー情報を取得する
        →ログインユーザーがフォローしている他ユーザーの情報を取得して表示する事
    */
    public function show()
    {
        // フォローしているユーザーのid取得→$following_idで取得する。
        $following_id = Auth::user()->follows()->pluck('①');
        // フォローしているユーザーのIDを基に投稿内容を取得→pluckは今回取得したい情報のカラム名の事
        $posts = Post::with('user')->whereIn('②', $following_id)->get();
        return view('yyyy', compact('posts'));
        // $postsにデータを引き継ぐ
    }
}
