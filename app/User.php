<?php
namespace App;
// ↑Appフォルダ内に存在する。
use Illuminate\Foundation\Auth\User as Authenticatable;
/*↑Authenticatableは認証可能機能のこと*/

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username', 'mail', 'password',
    ];

    protected $table = 'users';
    // ↑usersテーブルからデータを管理する（やり取りする）

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*参照先：https://qiita.com/namizatork/items/0c81b0a94a1084cda6de*/
    // フォローする（つながる）
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
        /*　↑$user_idを紐づける　*/
    }

    // フォロー解除する（つながりを断つ）
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
        /*　↑$user_idを解除する　*/
    }

    // フォローしているか（自分→相手をフォロー）
    public function isFollowing(Int $user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->first(['id']);
        /*　bool→true or false（真偽）が入る
        　　ユーザー（自分）が他のユーザーがフォローしているかを判定。
            followed_idが$user_idのレコードを取得。
        　*/
    }

    // フォローされているか（相手→自分をフォロー）
    public function isFollowed(Int $user_id)
    {
        return (bool) $this->followers()->where('following_id', $user_id)->first(['id']);
        /*
            他のユーザーが自分をフォローしているかを判定。
            following_idが$user_idのレコードを取得。
        */
    }
}
/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return App\Models\User
 */
