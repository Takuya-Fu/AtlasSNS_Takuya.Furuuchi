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

    /* 0203以下、フォロー・フォロワーモデルの＜リレーション＞を追加
    https://chat.openai.com/share/ca289f12-cf4b-4b99-b5b1-1257a5350b58 */
    /*　hasone 　*/ 
    // 【フォローする】
    public function following()
    {
        return $this->belongsToMany(User::class, 'id', 'username', 'following_id');
        // usersモデルから「id・username」、Followモデルから「following_id」と連携する。
    }
    // 【フォローされる】
    public function followers()
    {
        return $this->belongsToMany(User::class, 'id', 'username', 'follower_id');
        // usersモデルから「id・username」、Followモデルから「follower_id」と連携する。
    }
}
/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return App\Models\User
 */
