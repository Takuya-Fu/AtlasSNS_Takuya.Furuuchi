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
    // 1212以下数値で表示する為の表記
    public function show(User $user, Tweet $tweet, Follower $follower)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $timelines = $tweet->getUserTimeLine($user->id);
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);

        return view('users.show',[
            'user' =>$user,
            'is_following' => $is_following,
            'is_followed' => $is_followed,
            'timelines' => $timelines,
            'tweet_count' => $follow_count,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }

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
