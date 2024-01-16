<?php
// namespace App\Models\User;
namespace App;

// use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
/*↑Authenticatableは認証機能のこと*/
// ↓0106追加
use Illuminate\Database\Eloquent\Model;

// class User extends Authenticatable
// ↓0108追加
class User extends Model
// ↑useのどちらを使うか決める（Authenticatable or Model）
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username', 'mail', 'password',
    ];

    protected $table = 'users';
    // ↑usersテーブルからデータを管理する（やり取りする）

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}

/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return App\Models\User
 */
