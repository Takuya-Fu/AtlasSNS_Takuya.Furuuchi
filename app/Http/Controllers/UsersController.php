<?php

namespace App\Http\Controllers;

use App\User;
// ↑モデルとしてUser.phpを指定
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // プロフィール画面を表示
    public function profile()
    {
        return view('users.profile');
    }
    // 0108↓追加
    // public function index()
    // {
    //     $userNameData = new User();
    //     $userNames = $userNameData->getAllusers();
    //     return view('users.search', ['username' => $userNames]);
    // }
    // 0108↑追加

    // ユーザー検索部分を表示→この後ユーザー情報をモデルで取得したい
    public function search(Request $request)
    {
        return view('users.search', ['user' => $request]);
    }
}
