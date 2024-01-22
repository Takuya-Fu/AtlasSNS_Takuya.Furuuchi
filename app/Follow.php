<?php
// php artisan make:model Follow
namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'following_id', 'followed_id'
    ];

    public function getFollowCount($user_id){
        return $this->where('following_id',$user_id)->count();
    }

    public function getFollowerCount($user_id){
        return $this->where('followed_id',$user_id)->count();
    }
    // 続きはfollowsテーブル2024_01_21_224630_create_follows_table.php
}
