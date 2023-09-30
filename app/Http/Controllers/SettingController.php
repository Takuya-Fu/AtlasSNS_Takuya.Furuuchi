<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('settings', conpact('user'));
    }
}


// 以下補足コメント
// 先にphp artisan make:controller SettingsControllerしておくと、useが入力補完で自動で入るので便利です。
// https://progtext.net/programming/laravel-user-data/
