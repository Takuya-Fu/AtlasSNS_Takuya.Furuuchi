<?php
// followsー→誰が誰をフォローしているか管理する

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            // ↑IDを自動で採番する
            $table->integer('following_id');
            // ↑↓整数で表示する
            $table->integer('followed_id');
            $table->timestamp('created_at')->useCurrent();
            // ↑↓作成日時を記載する
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
            // 1201以下追加
            $table->unsignedInteger('user_id');
            // ↑↓符号なし整数型（0と1～9のみを格納するデータ型の一種）
            $table->unsignedInteger('followed_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}