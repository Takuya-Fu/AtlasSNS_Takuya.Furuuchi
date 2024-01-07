<?php
// https://qiita.com/vivid_colors/items/d75af56ae026eef834a0
namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    // テーブルとモデル(companies)が結び付いた設定。（ホワイトリスト）
    protected $gurded = array('id');
    // IDをfillableの値に結び付けない。（ブラックリスト）
    public $timestamps = true;

    protected $fillable = [
        'name','email','website','created_at','updated_at'
    ];

    // Employeeモデルとのリレーションを記述する
    public function employees()
    {
        return $this->hasMany('App\Employee');
        // hasManyは「持っている（抱えている）」という意味。
    }
}
