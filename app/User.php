<?php
// ユーザー情報を保存するためのテーブル
// 【参考】https://atlas-artlif.com/curriculum/7821/
// 【参考】https://qiita.com/monji586/items/58d91891caa51b514166
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate→各クラスとメソッドが定義されている

class User extends Authenticatable
{
    use Notifiable;

    // fillable（ホワイトリスト→許可）またはgurded（）ブラックリスト→拒否のどちらかを記述する
    // ↓ユーザー名・メールアドレス・パスワードをセキュリティ
    protected $fillable = [
        'username', 'mail', 'password',
    ];


}