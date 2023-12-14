<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
// ここのRequestがフォームのデータを拾ってくれる記述→functionの前にRequestと書く。

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
    // Requestのデータは$Requestとして扱うという意味
    {
        if ($request->isMethod('post')) {
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            // $password_confirmation = $request->input('password_confirmation');
            // 1214ここでバリデーションはいったん解除
            // $request->validate(
            //     [
            //         $username => 'required', 'string', 'min:2', 'max:12',
            //         $mail => 'required', 'string', 'email', 'unique', 'min:5', 'max:40',
            //         // $password => 'required', 'integer', 'min:8', 'max:20',
            //         $password => 'required', 'integer', 'min:1', 'max:10',
            //         'password_confirmation' => 'required',
            //     ],
            //     [
            //         'username.required' => 'ユーザーネームは必須項目です。',
            //         'mail.required' => 'メールアドレスは必須項目です。',
            //         'mail.email' => 'メールアドレスを正しく入力してください。',
            //         'mail.unique' => 'このメールアドレスは既に使われています。',
            //         'password.required' => 'パスワードは必須項目です。',
            //         'password.min' => 'パスワードは8文字以上で入力してください。',
            //         'password.max' => 'パスワードは20文字以下で入力してください。',
            //         'password_confirmation.required' => '確認用パスワードは必須項目です。',
            //     ],
            // );

            // バリデーション後の処理
            User::create([
                'username' => $username, // 変数usernameに変換する
                'mail' => $mail, // 変数mailに変換する
                'password' => bcrypt($password),
            ]);
            return redirect('added'); 
            // return redirect→URLを転送すること
            // ユーザー登録完了（addedルート→コントローラーadded処理）
        }
        return view('/login'); 
        // （post送信でない場合）register初期画面に戻る
    }

    public function added(Request $request){
        $username = $request->input('username');
        return view('auth.added',['username'=> $username ]); 
        // ユーザー登録完了画面を返す（表示する）
    }
}
