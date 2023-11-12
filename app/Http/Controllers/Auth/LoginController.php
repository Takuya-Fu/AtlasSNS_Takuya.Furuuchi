<?php
// ログイン時の情報はlogin.blade.phpからこちらへ飛んでくる
// https://qiita.com/yukachin0414/items/4e9408900f675070ee8e#:~:text=%E3%82%B3%E3%83%B3%E3%82%B9%E3%83%88%E3%83%A9%E3%82%AF%E3%82%BF%E3%81%A8%E3%81%AF%E3%82%AF%E3%83%A9%E3%82%B9%E3%81%8B%E3%82%89,%E3%81%8F%E3%82%8B%E3%81%AE%E3%81%A7%E5%A4%A7%E5%A4%89%E4%BE%BF%E5%88%A9%E3%81%A7%E3%81%99%E3%80%82
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
    // コンストラクタとは？→クラスから事例が発生する時（インスタンスを生成）に自動的に呼び出すメソッド。
    {
        $this->middleware('guest')->except('logout');
        // ゲスト（未ログイン状態）ならログアウトを行う
    }

    public function login(Request $request)
    // Request $request→サイト閲覧者がフォームから入力したデータを受け取る。
    // 以下ログイン時の処理について記載。
    {
        if ($request->isMethod('post')) {
            // もしもpost送信だった場合、
            $data = $request->only('mail', 'password');
            if (Auth::attempt($data)) {
                return redirect('/top');
            }
            // ログインが成功したら、トップページへ
        }
        return view("auth.login");
    }
}
