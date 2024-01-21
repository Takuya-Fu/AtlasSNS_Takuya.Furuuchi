<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logoutcontroller extends Controller
{
    //ログアウト用の記述を行う
    // もしも「ログアウトボタン」がクリックされたら
    // ログイン前のトップ画面に戻る。
    public function logout(){
        // ここは仮作成中→ログアウト方法が分かったら書き換えること
        Auth::logout();
        // return view('layouts.logout');
        return redirect('/login');
        // login画面に戻る。
    }
}
