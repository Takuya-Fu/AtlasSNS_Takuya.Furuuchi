<?php
// ↓0106Modelsフォルダに移行したため、場所を変更し記述も変更。
// namespace App\Models;
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// ↓0106追加
// use illuminate\database\Eloquent\Model;
// use illuminate\Support\Facades\DB;

/* 参照先URL:http://taustation.com/laravel-user-model/
userクラスはModelクラスを（直接には）継承していない。userクラスはAuthenticatableクラスを継承している。
AuthenticatableクラスはIlluminate\Foundation\Auth\Userのエイリアス（別名）として定義されている。 */ 

/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return App\Models\User
 */

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'username', 'mail', 'password',
    ];
    // protected $table = 'atlas_sns';
    /*　↑atlas_snsテーブルからデータを呼び出す。
    　　※現状データベースがテーブルが無いとエラーが出る　*/
}
