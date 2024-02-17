<?php

namespace App\Http\Controllers;

use App\User;
// Appという名前空間（階層）にあるUserモデルを使うという意味。
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Follower;

class UsersController extends Controller
{
    // public function index()
    // {
    //     $users = User::all();
        // Userモデルの情報を全て出力する
        // return view('users.search', compact('users'));
        /* compact関数は変数名を記載（カラム名はNG）。compact('users')→引数は$usersの事を指す。*/ 
    // }
    /* 0217　indexメソッドの内容を変更 　メソッドインジェクション→LaravelにはDI（依存性の注入）というのが内蔵されており、
    メソッドの引数に院ジェクト（注入）したいオブジェクトを記載することでインスタンスが使用可能
    ソースURL：https://qiita.com/namizatork/items/0c81b0a94a1084cda6de*/ 
    public function index(User $user)
    {
        $all_users = $user->getAllUsers(auth()->user()->id);
        // getAllUsers→全ての情報を取得する
        return view('users.index',[
            'all_users' => $all_users
        ]);
    }

    // プロフィール画面を表示
    public function profile()
    {
        return view('users.profile');
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

        return redirect()->route('user.show', Auth::user());
    }

    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }
}
