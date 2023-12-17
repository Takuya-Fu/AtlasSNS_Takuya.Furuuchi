<?php
// ユーザー同士のフォロー関係を保存するための中間テーブル
// https://blog.capilano-fw.com/?p=7369#i-3
namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';

    // ユーザーとツイートの関係(1対多）
    public function user() { //追加
        // return $this->belongsTo(\App\User::class, 'user_id', 'id');
        return $this->belongsTo(User::class);
        // belongsTo→所属する
        // 【解説】これでFollowテーブルのUser_idとusersテーブルのidがリレーションでき、
        // 
    }
    
}
