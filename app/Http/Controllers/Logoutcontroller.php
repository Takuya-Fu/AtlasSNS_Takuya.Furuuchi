<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logoutcontroller extends Controller
{
    //ログアウト用の記述を行う
    // もしも「ログアウトボタン」がクリックされたら
    // ログイン前のトップ画面に戻る。
    public function logout()
    {
        Auth::logout();
        return redirect()->route('/top');
        // echo 'Hello World';OK
    }
}
