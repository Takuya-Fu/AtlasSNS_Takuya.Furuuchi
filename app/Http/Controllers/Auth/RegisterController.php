<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // guestと判断された場合？
    }
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            // 送られて来たデータ（変数request）が（isMethodに）指定した文字列（post）とHTTP動詞が一致したら
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            // それぞれの変数に送られて来た上記3つの値を受け取り
            User::create([
                'username' => $username,
                // 変数usernameに変換する
                'mail' => $mail,
                // 変数mailに変換する
                'password' => bcrypt($password),
                // bcrypt（ハッシュアルゴリズムによる暗号化した）変数usernameに変換する
            ]);
            return redirect('added');
            // ユーザー登録完了（addedルート→コントローラーadded処理）
        }
        return view('auth.register');
        // （条件分岐で一致しない場合）register初期画面に戻る
    }

    // ユーザー登録が完了した場合（登録完了時）
    public function added()
    {
        return view('auth.added');
        // ユーザー登録完了画面を返す（表示する）
    }
}
