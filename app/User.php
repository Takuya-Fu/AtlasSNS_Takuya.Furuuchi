<?php
// 【Userモデル】
namespace App;
// ↑Appフォルダ内に存在する。
// use Illuminate\Notifications\Notifiable;
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

    // 0121以下、フォロー・フォロワーモデルを追加
    // 【フォロー機能→フォロー機能をつける】
    public function follow($user_id)
    {
        return $this->follows()->attach($user_id);
    }
    // 【フォロー解除】
    public function unfollow($user_id)
    {
        return $this->follows()->detach($user_id);
    }
    // 【フォローする】
    public function isFollowing($user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->exists();
        // boolean→変数の型 exists→存在する。
        // whereだと一つしか値が出ない
    }

    // 【フォローされる】
    public function isFollowed($user_id)
    {
        return (bool) $this->followers()->where('following_id', $user_id)->exists();
    }
}

/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return App\Models\User
 */
