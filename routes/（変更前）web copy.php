<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

// LaravelのTOP画面
Route::get('/', function () {
  return view('welcome');
});

// ろぐいんぺーじ：ログインページへ移行（ログアウトor未ログイン状態）
Auth::routes();
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

// ゆーざーとうろくまえ：ユーザー登録ページへ移行
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

// ゆーざーとうろくご：ユーザー登録完了
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ろぐいん：ログイン中のページ
Route::get('/home', 'PostsController@index');
Route::post('/home', 'PostsController@index');

// ふぉろわー：フォロワーリスト
Route::get('/follower-list', 'PostsController@followerList');

// ふぉろー：フォローリスト
Route::get('/follow-list', 'PostsController@followList');

/*　フォロー・フォロワー用　*/
Route::group(['middleware' => 'auth'], function () {
  Route::get('/show', 'FollowsController@show');
});

// ユーザー検索
Route::get('/search', 'UsersController@index');
Route::post('/search', 'UsersController@index');
// ユーザー検索用のボタンを押すとUsersControllerのindexを実行。

// まいぷろふぃーる：マイプロフィール
Route::get('/profile', 'UsersController@profile');
Route::post('/profile', 'UsersController@profile');

Route::resource('user', 'UsersController', ['only' => ['edit', 'update']]);
// ↑Route:get,post,delete等 +UsersController/〇〇等が全て一行で済む。 https://qiita.com/nanami173/items/6458bd0d1de6fe544ab2
/* この場合はuser/editまたはuser/updateのみルーティング指定している。editとは編集という意味。 */

// ろぐあうと：（仮）ログアウト機能→あくまでテスト用
// Route::get('/logout', 'Logoutcontroller@logout');
// Route::post('/logout', 'Logoutcontroller@logout');

Route::get('/logout','HomeController@logout');


/*以下追加部分*/ 

// （認証後の）フォロー設定・フォロー解除ルーティング
// Route::middleware('auth')->group(function () {
//   Route::post('users/{user}/follow', 'FollowController@follow')->name('users.follow');
//   Route::post('users/{user}/unfollow', 'FollowController@unfollow')->name('users.unfollow');
// });
// https://qiita.com/namizatork/items/0c81b0a94a1084cda6de
// Auth::routes();

// 0217追記
Auth::routes();
// 【名前付きルート】ミドルウェアを介してホーム画面にhomeと名前を表示する
Route::get('/home', 'HomeController@index')->name('home');
// Auth::routes();
// ログイン状態→ログインした時のみアクセス可能にする
Route::group(['middleware' => 'auth'], function () {
  // ユーザー関連
  // Route::resource('users', 'UsersController');
  Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);
  // フォロー・フォロー解除用のルーティングを追加
  Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
  // URLに（非表示の）ユーザーID含めて送信されたら、followメソッドを呼び出す。（フォローを行う）
  Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');
  // URLに（非表示の）ユーザーID含めて送信されたら、unfollowメソッドを呼び出す。（フォロー解除）
});
