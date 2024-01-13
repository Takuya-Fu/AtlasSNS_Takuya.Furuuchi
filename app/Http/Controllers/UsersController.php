<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
// use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.search', compact('users'));
        // compact関数は変数名を記載（カラム名はNG）
        // compact('users')→usersは変数$usersの事を指す。
    }

    // プロフィール画面を表示
    public function profile()
    {
        return view('users.profile');
    }

    // ユーザー検索部分を表示→この後ユーザー情報をモデルで取得したい
    public function search()
    {
        $users = User::paginate(5);
        return view('users.search')->with(['username' => $users]);
    }
}
