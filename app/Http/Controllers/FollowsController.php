<?php
// 0121作成
// https://teratail.com/questions/297833
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// User.phpからユーザーモデルを引用
use App\Post;
// Post.phpからポスト（投稿）モデルを引用
use App\Follow;
// （未作成）Follow.phpからフォローモデルを引用

class FollowsController extends Controller
{
    public function show(User $user, Follow $follow)
    {
        $login_user = auth()->user();
        // ログイン済みのユーザー情報を取得
        $is_following = $login_user->isFollowing($user->id);
        // フォローしているユーザーIDを取得
        $is_followed = $login_user->isFollowed($user->id);
        // フォローされているユーザーIDを取得
        $follow_count = $follow->getFollowCount($user->id);
        // フォローしている人数を取得
        $follower_count = $follow->getFollowerCount($user->id);
        // フォローされている人数を取得
        return view('users.show', [
            'user' => $user,
            'is_following' => $is_following,
            'is_followed' => $is_followed,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
            // 取得した情報を関数に代入。
        ]);
    }
}
