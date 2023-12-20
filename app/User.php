<?php
// ユーザー情報を保存するためのテーブル
// 【参考】https://atlas-artlif.com/curriculum/7821/
// 【参考】https://qiita.com/monji586/items/58d91891caa51b514166
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
    // fillable（ホワイトリスト→許可）またはgurded（）ブラックリスト→拒否のどちらかを記述する
    // ↓ユーザー名・メールアドレス・パスワードをセキュリティ
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // ↓取得対象外にする項目
    // 【参考】https://e-seventh.com/laravel-eloquent-hidden/
    // 【モデルで使えるメンバ変数】https://blog.capilano-fw.com/?p=2114
    protected $hidden = [
        'password', 'remember_token',
    ];
}
