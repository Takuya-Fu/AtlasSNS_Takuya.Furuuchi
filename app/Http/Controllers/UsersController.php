<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    // public function profile(){
    //     return view('users.profile');
    // }
    // public function search(){
    //     return view('users.search');
    // }
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
        if(!$is_following){
            // フォローしていればフォロー解除
            $follower->unfollow($user->id);
            return back();
        }
    }
}
