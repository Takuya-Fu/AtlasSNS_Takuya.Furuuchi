<?php
// LaravelのTOPページ
Route::get('/', function () {
  return view('welcome');
});

// 【名前付きルート】ミドルウェアを介してホーム画面に名前を表示する
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

// ろぐいんぺーじ：ログインページへ移行（ログアウトor未ログイン状態）
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
// ログイン処理する際にpostで送信する。
// postの場合、LoginControllerのloginに関する処理が行われる。

// ゆーざーとうろくまえ：ユーザー登録ページへ移行
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

// ゆーざーとうろくご：ユーザー登録完了
Route::get('/added', 'Auth\RegisterController@added');
// Route::post('/added', 'Auth\RegisterController@added');

//ろぐいん：ログイン中のページ
Route::get('/top', 'PostsController@index');
Route::post('top', 'PostsController@index');
// Route::get('next','/top', 'PostsController@index'::class,'index')->name('next.index');

// まいぷろふぃーる：マイプロフィール
Route::get('/profile', 'UsersController@profile');
Route::post('/profile', 'UsersController@profile');

// ゆーざー：ユーザー検索ページ
Route::get('/search', 'UsersController@search');
// Route::view('/search', 'UsersController@search');


// ふぉろー：フォローリスト
Route::get('/follow-list', 'PostsController@followList');

// ふぉろわー：フォロワーリスト
Route::get('/follower-list', 'PostsController@followerList');

// ろぐあうと：（仮）ログアウト機能→あくまでテスト用
Route::get('/logout', 'Logoutcontroller@logout');
Route::post('/logout', 'Logoutcontroller@logout');

// https://qiita.com/Hashimoto-Noriaki/items/f4af9fd8bdc10b2f489c
// 【テスト】ルーティング設定
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::get('login', 'Auth\LoginController@login')->name('login.post');
// Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// （認証後の）フォロー設定・フォロー解除ルーティング
Route::middleware('auth')->group(function () {
  Route::post('users/{user}/follow', 'FollowController@follow')->name('users.follow');
  Route::post('users/{user}/unfollow', 'FollowController@unfollow')->name('users.unfollow');
});

// 1206追加
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


