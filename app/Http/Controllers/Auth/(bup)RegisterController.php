<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
// ここのRequestがフォームのデータを拾ってくれる記述→functionの前にRequestと書く。
// bladeのフォームで記述した内容をblade→route→controller処理を行う。

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
    //「サイトを閲覧しているお客さんが入力フォームから記載したデータを変数Requestとして扱う。」という意味。
    // $request=サイト閲覧者がフォームから入力したデータを受け取るという意味。
    // Requestのデータは$Requestとして扱うという意味
    {
        // 【！！ここの記述でやりたい事！！】
        // POSTメソッドか判定する
        // 一致した場合、バリデーション機能を使って登録する情報を判定する。
        // 条件に不一致ならばregister初期画面に戻る
        if ($request->isMethod('post')) {
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            // 0820バリデーション機能を以下の通り記述。
            $request->validate([
                'username' => 'required', 'string', 'min:2', 'max:12',
                // $username => ['required', 'string', 'min:2', 'max:12'], // "・入力必須・2文字以上,12文字以内"
                'mail' => 'required', 'string', 'min:5', 'max:40',
                // $mail => ['required', 'string', 'min:5', 'max:40'], // "・入力必須・5文字以上,40文字以内・登録済みメールアドレス使用不可・メールアドレスの形式"
                'password' => 'required', 'integer', 'min:8', 'max:20'
                // $password => ['required', 'integer', 'min:8', 'max:20'] // "・入力必須・英数字のみ・8文字以上,20文字以内"
            ]);

            User::create([ // それぞれの変数に送られて来た上記3つの値を受け取り
                'username' => $username, // 変数usernameに変換する
                'mail' => $mail, // 変数mailに変換する
                'password' => bcrypt($password),                // bcrypt（ハッシュアルゴリズムによる暗号化した）変数usernameに変換する
            ]);
            return redirect('added'); // ユーザー登録完了（addedルート→コントローラーadded処理）
        }
        return view('auth.register'); // （条件分岐で一致しない場合）register初期画面に戻る
    }

    // ユーザー登録が完了した場合（登録完了時）
    public function added()
    {
        return view('auth.added'); // ユーザー登録完了画面を返す（表示する）
    }
}
