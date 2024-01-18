<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
// use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.search', compact('users'));
        // compact関数は変数名を記載（カラム名はNG）。
        // compact('users')→引数は$usersの事を指す。
    }

    // プロフィール画面を表示
    public function profile()
    {
        return view('users.profile');
    }

    // ユーザー検索部分を表示→この後ユーザー情報をモデルで取得したい
    public function search()
    {
        $users = User::paginate(5);
        // return view('users.search')->with(['username' => $users]);
    }

    /* 画像取得用(https://qiita.com/kkkanao7/items/680527275a38067f7015) */
    public function update(Request $request, $id)
    {
        // リクエストデータのすべてを取得し、変数に代入。
        $updateUser = $request->all();
        // プロフィール画像の変更があった場合（送信されてきた画像データ）
        if ($request->profile_image != null) {
            // storeメソッドで一意のファイル名を自動生成しつつstorage/app/public/profilesに保存し、そのファイル名（ファイルパス）を$profileImagePathとして生成
            $profileImagePath = $request->profile_image->store('public/profiles');
            // $updateUserのprofile_imageカラムに$profileImagePathを保存
            $updateUser['profile_image'] = $profileImagePath;
        }
        // ログイン中のユーザの情報を取得（変数koginUserに認証ユーザー情報を格納）し、$loginUserに代入
        $loginUser = Auth::user();
        // $updateUserのデータを受け取り、データベースへ保存
        $loginUser->fill($updateUser)->save();

        return redirect()->route('user.show',Auth::user());
    }
}
