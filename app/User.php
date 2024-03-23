<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/*↑Authenticatableは認証可能機能のこと*/
/*【豆知識】
belongsToMany→多対多
hasMany→1対多

*/ 

class User extends Authenticatable
{
    use Notifiable;

    /*【表示にする属性→元から設定済み】*/ 
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
    /*【非表示にする属性→元から設定済み】*/ 
    protected $hidden = [
        'password', 'remember_token',
    ];
    /* 特定の属性を非表示にする。
    →パスワードと具体的には、ユーザーが「Remember me」オプションを選択してログインした場合、そのユーザーが次回サイトにアクセスした際に自動的にログインされるようにするために使用 */ 
    
    // 【0323書き換え済み→コントローラーで実行する内容】
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_id', 'followed_id');
        // followersデータベースのテーブル名からfollowed_idとfollowing_idを結び付ける。
    }

    // ログインユーザーがフォローされている場合
    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'followed_id', 'following_id');
        // followersデータベースのテーブル名からfollowed_idとfollowing_idを結び付ける。
    }

    public function getAllUsers(Int $user_id)
    {
        return $this->Where('id', '<>', $user_id)->paginate(5);
        // 引数で受け取ったログインしているユーザを除くユーザを1ページに5名取得して表示。
        // getAllUsersはすべての値を受け取るメソッド。
    }

    // フォローする
    public function follow(Int $user_id)
    {
        return $this->followers()->attach($user_id);
        // return $this->followers()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->followers()->detach($user_id);
    }

    // フォローしているか（エラーが発生している箇所）
    public function isFollowing(Int $user_id)
    {
        return (bool)$this->followers()->where('followed_id', $user_id)->first(['id']);
        // boolean→真偽値
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (bool) $this->follows()->where('following_id', $user_id)->first(['id']);
    }

    public function updateProfile(array $params)
    {
        if (isset($params['profile_image'])) {
            $file_name = $params['profile_image']->store('public/profile_image/');

            $this::where('id', $this->id)
                ->update([
                    'screen_name'   => $params['screen_name'],
                    'name'          => $params['name'],
                    'profile_image' => basename($file_name),
                    'email'         => $params['email'],
                ]);
        } else {
            $this::where('id', $this->id)
                ->update([
                    'screen_name'   => $params['screen_name'],
                    'name'          => $params['name'],
                    'email'         => $params['email'],
                ]);
        }
        return;
    }

}
/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return App\Models\User
 */
