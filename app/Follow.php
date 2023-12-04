<?php
// ユーザー同士のフォロー関係を保存するための中間テーブル
namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';
}
