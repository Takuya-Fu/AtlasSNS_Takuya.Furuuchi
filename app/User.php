<?php
// ユーザー情報を保存するためのテーブル
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'username', 'mail', 'password',
    ];
    protected $table = 'atlas_sns';
    // ↑atlas_snsテーブルからデータを呼び出す
    public function getData()
    {
        $data = DB::table($this->table)->get();
        return $data;
        dd($data);
    }
}
