<?php
// ユーザー情報を取得するためのコントローラー

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Follower;

class UsersController extends Controller
{
    // プロフィール画面を表示
    public function profile(){
        return view('users.profile');
    }
    // ユーザー検索部分を表示
    public function search(){
        return view('users.search');
    }
}
