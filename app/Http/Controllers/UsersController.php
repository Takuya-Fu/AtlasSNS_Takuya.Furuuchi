<?php

namespace App\Http\Controllers;

use App\User;
// Appという名前空間（階層）にあるUserモデルを使うという意味。
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //  public function index()
    //  {
    //      $users = User::all();  // ←Userモデルの情報を全て出力する
    //  return view('users.search', compact('users'));
    // //  compact('users')は$userに値を渡すための関数。
    //  }

    public function index(User $user)
    /*　メソッドインジェクション→Userモデルからの内容を$userに引き渡す。
        これを作れば$user = new Userという変数定義が不要。　*/
    {
        $all_users = $user->getAllUsers(auth()->user()->id);
        // Userモデルからの情報→$user→$all_usersの順番に値を引き渡す。

        return view('users.index', [
            'all_users' => $all_users
            // ↑連想配列を表している。all_usersと言えば、$all_usersと値を関連付けるようにする。
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Tweet $tweet, Follower $follower)
    {
        $login_user = auth()->user();
        // ログインしたユーザー情報（自分の情報）
        $is_following = $login_user->isFollowing($user->id);
        // フォローしているか
        $is_followed = $login_user->isFollowed($user->id);
        // フォローされているか
        $timelines = $tweet->getUserTimeLine($user->id);
        // タイムライン情報
        $tweet_count = $tweet->getTweetCount($user->id);
        // ツイート数カウント
        $follow_count = $login_user->getFollowCount($user->id);
        // フォローしている人数カウント
        $follower_count = $login_user->getFollowerCount($user->id);
        // フォローされている人数カウント


        return view('users.show', [
            // usersフォルダ内にshow.blade.phpを作成する。
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    // アップデート時のバリデーション機能
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $validator = Varidator::make($data, [
            'screen_name'   => ['required', 'string', 'max:50', Rule::unique('users')->ignore($user->id)],
            'name'          => ['required', 'string', 'max:255'],
            'profile_image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)]
        ]);
        $validator->validate();
        $user->updateProfile($data);

        return redirect('users/' . $user->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // フォローとフォロー解除はresourceのどのアクションにも該当しないので、独自に追加します。
    // 【フォロー】
    public function follow($id)
    // Userモデルの内容を$userに引き渡す。
    {
        $follower = auth()->user();
        // ↑ログインユーザーの番号を変数に引き渡す。
        $is_following = $follower->isFollowing($id);
        // ↑$followerが$userをフォローしているか。

        // フォローしているか
        if (!$is_following) {
            $follower->follow($id);
            // Follower::create(['following_id' =>$id,'followed_id' =>$follower]);
            // Follower::create(['followed_id' =>$id,'following_id' =>$follower->id]);
            return back();
            // ↑もしもフォローしていなければ、フォローする。
        }
    }

    // 【フォロー解除】
    public function unfollow($id)
    {
        $follower = auth()->user();
        // ↑フォローしているか
        $is_following = $follower->isFollowing($id);

        if ($is_following) {
            $follower->unfollow($id);
            return back();
            // ↑もしもフォローしていれば、フォローを解除する。
        }
    }
}
