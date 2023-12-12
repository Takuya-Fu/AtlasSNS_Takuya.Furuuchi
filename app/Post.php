<?php
// POSTテーブルは記事を表す
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // リレーションシップ
    public function user(){ //追加
        
        return $this->belongsTo(\App\Users::class, 'user_id', 'id');
        // belongsTo→所属する
    }
}
