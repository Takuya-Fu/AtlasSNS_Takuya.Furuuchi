<?php
// ユーザー情報を保存するためのテーブル
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // ChatGPT結果より記載
    // メソッドは6つ作成
    // （フォローする・フォロー解除する・フォローされている・フォローされていない・フォローされていない→フォローOK・フォローされている→フォローNG）
    // フォロワー→フォロー
    public function followers()
    {
        return $this->belongsToMany(User::class,'user_follows','user_id','follower_id');
    }

    // フォロー→フォロワー
    public function following()
    {
        return $this->belongsToMany(User::class,'user_follows','follower_id','user_id');
    }
}
