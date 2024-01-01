<?php
/*【動作手順を記述】
＜ログイン部分＞
【新規ユーザー】
1.ログイン画面→新規登録→登録後に名前を表示→ログインする→ログイン後にマイページを表示
【登録済みユーザー】
2.ログイン画面→ログインする→ログイン後にマイページを表示
【パスワードを忘れたユーザー】
3.ログイン画面→パスワードを忘れた方画面→パスワード再発行→ログインする→ログイン後にマイページを表示

＜☆作成中☆→ユーザー検索＞
ユーザー検索ボタンを押下したら「自分以外のユーザーが全て表示されている状態にする」
・ユーザーアイコン
・ユーザー名
・フォロー登録ボタン/フォロー解除ボタンを設置
*/

// 1.LaravelにアクセスしたらTOPページを表示する
Route::get('/', function () {
  return view('welcome');
});

// ゆーざー：ユーザー検索ページ
Route::get('/search', 'UsersController@search');


// 【名前付きルート】ミドルウェアを介してホーム画面に名前を表示する
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

// ろぐいんぺーじ：ログインページへ移行（ログアウトor未ログイン状態）
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
// ↑Authフォルダの中のLoginControllerにあるloginの処理を行うという意味

// ゆーざーとうろくまえ：ユーザー登録ページへ移行
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

// ゆーざーとうろくご：ユーザー登録完了
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ろぐいん：ログイン中のページ
Route::get('/top', 'PostsController@index');
Route::post('top', 'PostsController@index');

// まいぷろふぃーる：マイプロフィール
Route::get('/profile', 'UsersController@profile');
Route::post('/profile', 'UsersController@profile');

// ふぉろー：フォローリスト
Route::get('/follow-list', 'PostsController@followList');

// ふぉろわー：フォロワーリスト
Route::get('/follower-list', 'PostsController@followerList');

// ろぐあうと：（仮）ログアウト機能→あくまでテスト用
Route::get('/logout', 'Logoutcontroller@logout');
Route::post('/logout', 'Logoutcontroller@logout');

// （認証後の）フォロー設定・フォロー解除ルーティング
Route::middleware('auth')->group(function () {
  Route::post('users/{user}/follow', 'FollowController@follow')->name('users.follow');
  Route::post('users/{user}/unfollow', 'FollowController@unfollow')->name('users.unfollow');
});

Route::get('/', function () {
  return view('welcome');
});

// https://qiita.com/namizatork/items/0c81b0a94a1084cda6de
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// ログイン状態→認証したときにしかアクセスできないようにする。
Route::group(['middleware' => 'auth'], function () {
  // ユーザー関連
  Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);
});
