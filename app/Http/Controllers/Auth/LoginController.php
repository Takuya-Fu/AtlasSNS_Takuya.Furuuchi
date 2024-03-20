<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
// use App\Providers\RouteServiceProvider;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    // 参考：https://qiita.com/tiwu_dev/items/2a95baecb8c23eef3c67

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // guest状態なら以下のlogoutメソッドを実施する。
    }

    public function login(Request $request)
    // 0118MVCでユーザー情報受け渡してから$request使えなくなった？
    // https://qiita.com/crosawassant/items/d8b434f0bc98455165b4#%E3%81%BE%E3%81%A8%E3%82%81%E3%81%AE%E3%82%BD%E3%83%BC%E3%82%B9
    {
        if ($request->isMethod('post')) {
            $data = $request->only('mail', 'password');
            if (Auth::attempt($data)) {
                return redirect('/top');
            }
        }
        return view('auth.login');
        // 未ログインorログインできない場合ログイン画面を表示する。
    }
}
