<?php
// ユーザー情報を取得するためのコントローラー

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Follower;

class UsersController extends Controller
{
    // メソッドインジェクション→(User $user)の部分
    public function index(User $user)
    {
        $all_users = $user->getAllUsers(auth()->user()->id);
        return view('users.index', [
            'all_users' => $all_users
        ]);
    }

    // フォローする
    public function follow(User $user)
    {
        $follower = auth()->user();
        // $this->following()->attach($user->id);
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        // フォロワーされていなければフォローする
        if (!$is_following) {
            $follower->follow($user->id);
            return back();
        }
    }
    // フォロー解除する
    public function unfollow(User $user)
    {
        // $this->following()->detach($user->id);
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if ($is_following) {
            // フォローしていればフォロー解除
            $follower->unfollow($user->id);
            return back();
        }
    }
}
