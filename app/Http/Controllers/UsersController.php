<?php

namespace App\Http\Controllers;
use App\User;
// Appという名前空間（階層）にあるUserモデルを使うという意味。
use Illuminate\Http\Request;

class UsersController extends Controller
{
     public function index()
     {
         $users = User::all();  // ←Userモデルの情報を全て出力する
     return view('users.search', compact('users'));
    //  compact('users')は$userに値を渡すための関数。
     }

    // public function index(User $user)
    // // 0317Userモデルのユーザー情報を最初のプロフィールに表示したい。→修正が必要。
    // {
    //     $all_users = $user->getAllUsers(auth()->user()->id);
    //     /* Userモデルで、ログイン中ユーザー情報の、IDをを取得する。
    //     　 auth()->user()->idは現在のログインしているユーザーIDを取得。
    //     */
    //     return view('users.search', [
    //         'all_users' => $all_users
    //         // どこをどのようにして表示したいかを考える。プロフィールを表示するならどのように表示したいかを思い浮かべる。
    //     ]);
    // }

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

    // 【フォロー機能】
    // フォローする
    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if (!$is_following) {
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
        if ($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }
}
