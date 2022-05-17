<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_bin';
            $table->increments('id');
            $table->string('api_id', 255)->unique()->comment('apiId');
            $table->text('book_cover_url')->nullable()->comment('表紙URL');
            $table->string('title', 255)->comment('タイトル');
            $table->string('author', 255)->comment('著者名');
            $table->text('description')->comment('あらすじ');
            $table->dateTime('created_at', $precision = 0)->comment('作成時間');
            $table->dateTime('updated_at', $precision = 0)->comment('更新時間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
