<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/*↑Authenticatableは認証可能機能のこと*/

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'username', 'mail', 'password',
    ];
    /* $fillableはMVCモデルに対して一括代入を許可する属性（カラム）を指定する。→セキュリティ上の理由で指定したカラム以外に一括代入を防ぐため。 */ 

    protected $table = 'users';
    /* usersテーブルに関連付けられる。 */ 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /* 特定の属性を非表示にする。
    →パスワードと具体的には、ユーザーが「Remember me」オプションを選択してログインした場合、そのユーザーが次回サイトにアクセスした際に自動的にログインされるようにするために使用 */ 

    public function follows(){
        return $this->belongsToMany(User::class,'follower_user','follower_id','user_id');
    }
    public function followers(){
        return $this->belongsToMany(User::class,'follower_user','follower_id','user_id');
    }
}
/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return App\Models\User
 */
