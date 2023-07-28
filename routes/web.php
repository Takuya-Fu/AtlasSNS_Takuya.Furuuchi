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

Auth::routes();



//ログアウト中のページ
// ・ログインページへ移行
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

// ・ユーザー登録ページへ移行
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

// ・ユーザー登録完了
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top', 'PostsController@index');

Route::get('/profile', 'UsersController@profile');

Route::get('/search', 'UsersController@index');

Route::get('/follow-list', 'PostsController@index');
Route::get('/follower-list', 'PostsController@index');

// 0724ここから追記部分→hello world!と表示される。
Route::get('/hello', function () {
  echo 'hello world!';
});
// URLのパスにhelloと入力した際、hello world!を表示する。
