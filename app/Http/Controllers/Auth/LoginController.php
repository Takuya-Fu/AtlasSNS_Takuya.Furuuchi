<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
    // コンストラクタとは？→
    {
        $this->middleware('guest')->except('logout');
        // ゲスト（未ログイン状態）ならログアウトを行う
    }

    public function login(Request $request)
    // ログイン時に
    {
        if ($request->isMethod('post')) {
            // ここにバリデーションを配置する
            $data = $request->only('mail', 'password');
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if (Auth::attempt($data)) {
                return redirect('/top');
            }
        }
        return view("auth.login");
    }
}
