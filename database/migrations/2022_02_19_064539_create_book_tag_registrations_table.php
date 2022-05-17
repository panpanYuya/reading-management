<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTagRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tag_registrations', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_bin';
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザーid');
            $table->unsignedInteger('tag_id')->comment('タグid');
            $table->unsignedInteger('book_id')->comment('ブックid');
            $table->dateTime('created_at', $precision = 0)->comment('作成時間');
            $table->dateTime('updated_at', $precision = 0)->comment('更新時間');

            $table->foreign('user_id')->references('id')->on('user_auths');
            $table->foreign('tag_id')->references('id')->on('look_back_tag_registrations');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_tag_registrations');
    }
}
