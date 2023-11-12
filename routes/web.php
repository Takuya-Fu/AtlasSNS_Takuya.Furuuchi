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

Route::get('/', function () {
  return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
// 名前付きルート
//

Auth::routes();


//ログアウト中のページ
// ・ログインページへ移行
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
// ログイン処理する際にpostで送信する。
// postの場合、LoginControllerのloginに関する処理が行われる。

// ・ユーザー登録ページへ移行
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

// ・ユーザー登録完了
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');
// Auth\でAuthフォルダ直下のファイルにあるコントローラーを選択できる。

//ログイン中のページ
Route::get('/top', 'PostsController@index');
Route::post('/top', 'PostsController@index');
// Route::get('next','/top', 'PostsController@index'::class,'index')->name('next.index');

Route::get('/profile', 'UsersController@profile');
Route::post('/profile', 'UsersController@profile');

Route::get('/search', 'UsersController@search');

Route::get('/follow-list', 'PostsController@followList');
Route::get('/follower-list', 'PostsController@followerList');

// （仮）ログアウト機能→あくまでテスト用
Route::get('/logout', 'Logoutcontroller@logout');
Route::post('/logout', 'Logoutcontroller@logout');

// ログアウト機能（実際用）
// https://www.youtube.com/watch?v=UcBHf0L9KVU
// Route::post('logout',
// [AuthController::class,'logout'])
// ->name('logout');