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
            'user_name' => 'test@test.com',
            'mail_address' => 'test@test.com',
            'password' => Hash::make('password'),
            'created_at' => '2022-05-24 16:39:39',
            'updated_at' => '2022-05-24 16:39:39',
        ]);
    }
}
