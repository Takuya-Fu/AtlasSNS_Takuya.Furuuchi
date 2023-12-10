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

    // ChatGPT結果より記載し、quitaの内容を追記
    // https://chat.openai.com/share/f5c6c126-2848-4f7d-bcbb-73463560f449
    // https://qiita.com/namizatork/items/0c81b0a94a1084cda6de

    // belongsToMany→多対多　attach→紐づける　detach→切り離す
    // username→ログイン名　mail→メールアドレス　password→ログインパスワード

    // ユーザーがフォローしているユーザーを取得するリレーション（関連付け）
    // belongToMany→多対多=ユーザー同士を結び付けること

    // 【フォローしているとき】
    public function following()
    {
        return $this->belongsToMany(User::class, 'user_follows', 'follower_id', 'user_id');
        // ↑フォローするときはユーザー名・フォロワーユーザー・フォローしている人のIDを表示
    }

    // 【フォローされているとき】
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follows', 'user_id', 'follower_id');
        // ↑フォローされているときはユーザー名・ユーザーID・フォロワーIDを表示
    }

    // 5名分の情報を習得して表示　paginate→ページ割りの事を表す。
    public function getAllUsers(Int $user_id)
    {
        return $this->Where('id', '<>', $user_id)->paginate(5);
        // ↑<>は不等号（自分の情報が出ないようにする？不一致になるように。）
        // WhereはEloquentに関係してくる。
    }

    // 【フォロー設定する】
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
        // フォローするときは
    }

    // 【フォローを解除する】
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (bool) $this->followers()->where('followed_id', $user_id)->first(['id']);
    }
}
