<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index()
    {
        return view('posts.index');
        // viewsフォルダ内のpostsフォルダ以下の階層のindex.blade.phpを参照する
    }
    // フォローリスト　followList
    public function followList(){
        return view('follows.followList');
    }
    // フォロワーリスト　followerList
    public function followerList(){
        return view('follows.followerList');
    }
    public function search(){
        return view('users.search');
    }

}
