<?php
// ユーザー情報を保存するためのテーブル
// 【参考】https://atlas-artlif.com/curriculum/7821/
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

    // belongsToMany→多対多　attach→紐づける　detach→切り離す
    // ユーザーがフォローしているユーザーを取得するリレーション（関連付け）
    // belongToMany→多対多=ユーザー同士を結び付けること

    // 【①フォローしているとき】
    public function following()
    {
        return $this->belongsToMany(User::class, 'user_follows', 'follower_id', 'user_id');
        // ↑フォローするときはユーザー名・フォロワーユーザー・フォローしている人のIDを表示
    }

    // 【②フォローされているとき】
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follows', 'user_id', 'follower_id');
        // ↑フォローされているときはユーザー名・ユーザーID・フォロワーIDを表示
    }

    // 【③フォロー設定する→フォローが行われていない】
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
        // フォローするときは
    }

    // 【④フォローを解除する→削除】
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // 【⑤フォロー→チェック機能】既にフォローしているか
    public function isFollowing(Int $user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    // 【⑥フォロワー→チェック機能】既にフォローされているか
    public function isFollowed(Int $user_id)
    {
        return (bool) $this->followers()->where('followed_id', $user_id)->first(['id']);
    }

    // 5名分の情報を習得して表示　paginate→ページ割りの事を表す。
    public function getAllUsers(Int $user_id)
    {
        return $this->Where('id', '<>', $user_id)->paginate(5);
        // ↑<>は不等号（自分の情報が出ないようにする？不一致になるように。）
        // WhereはEloquentに関係してくる。
    }
}
