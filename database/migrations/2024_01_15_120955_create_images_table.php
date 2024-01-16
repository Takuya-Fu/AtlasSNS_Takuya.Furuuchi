<?php
/* プロフィール画像作成用テーブル
https://qiita.com/kkkanao7/items/680527275a38067f7015
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->text('image_name');
            $table->text('image_path');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    // ↑downメソッドはロールバック用関数（マイグレーションをもとに戻す用）
    {
        Schema::dropIfExists('images');
    }
}
