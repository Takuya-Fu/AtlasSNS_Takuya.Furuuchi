<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //ChatGPTから転記
    // 【フォロー時】
    // attach→紐づける
    public function follow(Request $request, User $user){
        auth()->user()->following()->attach($user->id);
        return back()->with('success','フォローしました');
    }
    // 【フォロー外れた時】
    // detach→切り離すこと
    public function unfollow(Request $request, User $user){
        auth()->user()->following()->detach($user->id);
        return back()->with('success','フォローを解除しました');
    }

    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}
