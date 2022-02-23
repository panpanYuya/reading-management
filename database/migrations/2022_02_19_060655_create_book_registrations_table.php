<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_registrations', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_bin';
            $table->increments('id');
            $table->string('title', 255)->comment('タイトル');
            $table->unsignedInteger('user_id')->comment('ユーザーid');
            $table->boolean('unread_flg')->comment('未読フラグ');
            $table->string('book_cover_URL', 255)->nullable()->comment('表紙URL');
            $table->string('book_impression', 255)->nullable()->comment('感想');
            $table->unsignedInteger('genre_id')->nullable()->comment('ジャンルid');
            $table->dateTime('created_at', $precision = 0)->comment('作成時間');
            $table->dateTime('updated_at', $precision = 0)->comment('更新時間');

            $table->foreign('user_id')->references('id')->on('user_auths');
            $table->foreign('genre_id')->references('id')->on('genre_masters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_registrations');
    }
}
