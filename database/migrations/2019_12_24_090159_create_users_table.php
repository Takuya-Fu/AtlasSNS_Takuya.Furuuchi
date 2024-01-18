<?php
// 登録したユーザー情報
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // usersテーブルを作成し、以下の
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('username', 255);
            $table->string('mail', 255);
            $table->string('password', 255);
            $table->string('bio', 400)->nullable();
            // $table->string('images', 255)->default('icon1.png');
            $table->string('profile_image', 255)->nullable()->comment('プロフィール画像'); //0117追加
            // ↑画像の部分のパスを変更する
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
