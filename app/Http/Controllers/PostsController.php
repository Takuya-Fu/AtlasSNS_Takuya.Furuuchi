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
}
