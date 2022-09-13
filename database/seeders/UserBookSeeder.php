<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テスト用ユーザー
        DB::table('user_books')->insert([
            'id' => '1',
            'user_id' => '1',
            'book_id' => '3',
            'read_status' => 1,
            'created_at' => '2022-09-24 16:39:39',
            'updated_at' => '2022-09-24 16:39:39',
        ]);
        DB::table('user_books')->insert([
            'id' => '2',
            'user_id' => '1',
            'book_id' => '4',
            'read_status' => 2,
            'created_at' => '2022-09-24 16:39:39',
            'updated_at' => '2022-09-24 16:39:39',
        ]);
        DB::table('user_books')->insert([
            'id' => '3',
            'user_id' => '1',
            'book_id' => '5',
            'read_status' => 3,
            'created_at' => '2022-09-24 16:39:39',
            'updated_at' => '2022-09-24 16:39:39',
        ]);
        DB::table('user_books')->insert([
            'id' => '4',
            'user_id' => '2',
            'book_id' => '6',
            'read_status' => 2,
            'created_at' => '2022-09-24 16:39:39',
            'updated_at' => '2022-09-24 16:39:39',
        ]);
        DB::table('user_books')->insert([
            'id' => '5',
            'user_id' => '3',
            'book_id' => '7',
            'read_status' => 3,
            'created_at' => '2022-09-24 16:39:39',
            'updated_at' => '2022-09-24 16:39:39',
        ]);
    }
}
