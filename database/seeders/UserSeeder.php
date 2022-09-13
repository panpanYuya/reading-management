<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テスト用ユーザー
        DB::table('user_auths')->insert([
            'id' => '1',
            'user_name' => 'testUser1',
            'mail_address' => 'testUser1',
            'password' => Hash::make('password1'),
            'created_at' => '2022-05-24 16:39:39',
            'updated_at' => '2022-05-24 16:39:39',
        ]);
        //テスト用ユーザー
        DB::table('user_auths')->insert([
            'id' => '2',
            'user_name' => 'testUser2',
            'mail_address' => 'testUser2',
            'password' => Hash::make('password2'),
            'created_at' => '2022-05-24 16:39:39',
            'updated_at' => '2022-05-24 16:39:39',
        ]);
        //テスト用ユーザー
        DB::table('user_auths')->insert([
            'id' => '3',
            'user_name' => 'testUser3',
            'mail_address' => 'testUser3',
            'password' => Hash::make('password3'),
            'created_at' => '2022-05-24 16:39:39',
            'updated_at' => '2022-05-24 16:39:39',
        ]);
    }
}
