<?php
// フォローモデル
// ユーザー同士のフォロー関係を保存するための中間テーブル
// https://blog.capilano-fw.com/?p=7369#i-3
namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';
    // フォロー数をカウントする→変数は適切なものに書き換える
    public function getFollowCount($user_id){
        return $this->where('following_id', $user_id)->count();
    }
    // フォロワー数をカウントする→変数は適切なものに書き換える
    public function getFollowerCount($user_id){
        return $this->where('followed_id', $user_id)->count();
    }
}
    
