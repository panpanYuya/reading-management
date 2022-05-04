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
            $table->string('api_id', 255)->comment('apiId');
            $table->string('title', 255)->comment('タイトル');
            $table->string('author', 255)->comment('著者名');
            $table->string('book_cover_url', 255)->nullable()->comment('表紙URL');
            $table->unsignedInteger('genre_id')->nullable()->comment('ジャンルid');
            $table->dateTime('created_at', $precision = 0)->comment('作成時間');
            $table->dateTime('updated_at', $precision = 0)->comment('更新時間');

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
