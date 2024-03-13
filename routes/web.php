<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// LaravelのTOP画面
Route::get('/', function () {
  return view('welcome');
});

// ログイン中にTOP画面に戻り、ログイン者の名前を表示する。
Route::get('/home', 'HomeController@index')->name('home');


// ログアウト用（ログイン状態解除）
Route::get('logout','HomeController@logout');

/*　1.ログアウト中のページ　*/ 
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
// ゆーざーとうろくまえ：ユーザー登録ページへ移行
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
// ゆーざーとうろくご：ユーザー登録完了
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

/*　2.ログイン中のページ　*/ 
Auth::routes();
Route::get('/top','PostsController@index');
Route::get('/profile','UsersController@profile');
Route::get('/search','UsersController@index');
Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

// ユーザー検索
Route::get('/search', 'UsersController@index');
Route::post('/search', 'UsersController@index');
// ユーザー検索用のボタンを押すとUsersControllerのindexを実行。

// まいぷろふぃーる：マイプロフィール
Route::get('/profile', 'UsersController@profile');
Route::post('/profile', 'UsersController@profile');

