<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
Route::get('/search',[UsersController::class,'search']);
// ↑URLの\searchにアクセスしたらUsersController内のsearchメソッドにアクセスする。


// 1.LaravelにアクセスしたらTOPページを表示する
Route::get('/', function () {
  return view('welcome');
});

// 【名前付きルート】ミドルウェアを介してホーム画面に名前を表示する
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

// ろぐいんぺーじ：ログインページへ移行（ログアウトor未ログイン状態）
// Route::get('/login', 'Auth\LoginController@login');
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
// https://qiita.com/namizatork/items/0c81b0a94a1084cda6de
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// ログイン状態→認証したときにしかアクセスできないようにする。
Route::group(['middleware' => 'auth'], function () {
  // ユーザー関連
  Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);
});
