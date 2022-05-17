<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStickyRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sticky_registrations', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_bin';
            $table->increments('id');
            $table->unsignedInteger('book_id')->comment('ブックid');
            $table->unsignedInteger('user_id')->comment('ユーザーid');
            $table->integer('sticky_num')->comment('付箋番号');
            $table->string('sticky_title', 255)->nullable()->comment('付箋タイトル');
            $table->string('sticky_memo', 255)->comment('付箋メモ');
            $table->dateTime('created_at', $precision = 0)->comment('作成時間');
            $table->dateTime('updated_at', $precision = 0)->comment('更新時間');

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('user_id')->references('id')->on('user_auths');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sticky_registrations');
    }
}
