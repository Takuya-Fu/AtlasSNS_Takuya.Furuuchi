<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            // $table->bigIncrements('id');
            // $table->timestamps();
            $table->increments('id')->autoIncrement();
            $table->integer('following_id')->unsigned();
            $table->integer('followed_id')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->index('following_id');
            $table->index('followed_id');
            $table->unique(['following_id', 'followed_id']);
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
