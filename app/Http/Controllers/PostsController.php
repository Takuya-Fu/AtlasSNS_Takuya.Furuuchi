<?php
// 見本　https://xd.adobe.com/view/0c9134dc-3528-4b4d-5c2a-b892202aa207-7aa0/screen/65f4e60b-6b17-4e39-a339-fe432bc03501?hints=off
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
