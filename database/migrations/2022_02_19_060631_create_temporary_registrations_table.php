<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_registrations', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_bin';
            $table->increments('id')->comment('id');
            $table->unsignedInteger('user_id')->nullable()->comment('ユーザーid');
            $table->string('user_name', 100)->unique()->comment('ユーザー名');
            $table->string('mail_address', 255)->nullable()->comment('メールアドレス');
            $table->string('password', 255)->comment('パスワード');
            $table->string('login_token', 255)->nullable()->comment('ログイン用トークン');
            $table->string('temporary_token',255)->comment('仮登録用トークン');
            $table->dateTime('created_at', $precision = 0)->comment('作成時間');
            $table->dateTime('updated_at', $precision = 0)->comment('更新時間');

            $table->foreign('user_id')->references('id')->on('user_auths')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporary_registrations');
    }
}
