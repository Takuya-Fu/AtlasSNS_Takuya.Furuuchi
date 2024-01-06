<?php
// ユーザー情報を取得するためのコントローラー
// https://nebikatsu.com/8134.html/
namespace App\Http\Controllers;
// namespace App;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // プロフィール画面を表示
    public function profile()
    {
        return view('users.profile');
    }
    // ユーザー検索部分を表示→この後ユーザー情報をモデルで取得したい
    public function search(Request $request)
    {
        // $request = User::all();
        return view('users.search',['user' => $request]);
    }
}
