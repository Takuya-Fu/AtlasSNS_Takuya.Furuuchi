<?php
// POSTテーブルは記事を表す
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // リレーションシップ
    public function user(){
        return $this->belongsTo(\App\Users::class, 'user_id', 'id');
        // belongsTo→所属する
        // id→ユーザー番号　username→登録名　mail→メールアドレス　images→画像アイコン
    }
}
