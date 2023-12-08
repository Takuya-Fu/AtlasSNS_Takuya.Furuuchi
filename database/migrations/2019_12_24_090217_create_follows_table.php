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
            $table->integer('following_id');
            $table->integer('followed_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
            // 1201以下追加
            $table->unsignedInteger('user_id');
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

// https://chat.openai.com/share/ef35e83c-ef12-4a54-84e5-72d2ad0e5d27
// public function up()
// {
//     Schema::create('followers',function (Blueprint $table){
//         $table->id();
//         $table->unsignedBigInteger('user_id');
//         $table->unsignedBigInteger('follower_id');
//         $table->timestamps();

//         $table->unique(['user_id','follower_id']);

//         $table->foreingn('user_id')->references('id')->on('users')->onDelete('cascade');
//         $table->foreingn('follower_id')->references('id')->on('users')->onDelete('cascade');
//     });
    // 
// }