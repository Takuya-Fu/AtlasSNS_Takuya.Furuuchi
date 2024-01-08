<?php
// app/User.php

// namespace App\Models;
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable; /*←Authenticatableは認証機能のこと*/
// ↓0106追加
use Illuminate\database\Eloquent\Model;

class User extends Authenticatable
// ↓0108追加
// class User extends Model
{
    // use Notifiable;
    // ↓0108追加
    public function getAllUsers(){
        return $this->all();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username', 'mail', 'password',
    ];
    // protected $table = 'atlas_sns';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return App\Models\User
 */
