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
    // https://chat.openai.com/share/f5c6c126-2848-4f7d-bcbb-73463560f449
    

    // belongsToMany→多対多　attach→紐づける　detach→切り離す
    // ユーザーがフォローしているユーザーを取得するリレーション（関連付け）
    public function following()
    {
        return $this->belongsToMany(User::class,'user_follows','follower_id','user_id');
    }

    // ユーザーがフォローされているユーザーを取得するリレーション
    public function followers()
    {
        return $this->belongsToMany(User::class,'user_follows','user_id','follower_id');
    }

    // ユーザーをフォローする
    public function follow(User $user){
        $this->following()->attach($user->id);
    }

    // ユーザーのフォローを解除する
    public function unfollow(User $user){
        $this->following()->detach($user->id);
    }
}