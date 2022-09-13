<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StickyRegistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sticky_registrations')->insert([
            'id' => '1',
            'user_book_id' => '1',
            'page_number' => '37',
            'sticky_title' => '良い戦略の立て方',
            'sticky_memo' => '戦略をしっかりと考え、後はただ実行に移していくことがいいい戦略といえるだろう',
            'created_at' => '2022-09-12 21:46:29',
            'updated_at' => '2022-09-12 21:46:29',
        ]);
        DB::table('sticky_registrations')->insert([
            'id' => '2',
            'user_book_id' => '1',
            'page_number' => '89',
            'sticky_title' => '戦略を試してみる',
            'sticky_memo' => '➀自分が今挑戦しているもの\n　　　↓\n➁戦略を立てる\n　　　↓\n➂戦略を実行する\n　　　↓\n➃戦略の見直しをする\n　　　↓\n➂に戻るを繰り返す。\n\nこれが戦略を実行するうえで大切になること',
            'created_at' => '2022-09-12 21:46:29',
            'updated_at' => '2022-09-12 21:46:29',
        ]);
        DB::table('sticky_registrations')->insert([
            'id' => '3',
            'user_book_id' => '1',
            'page_number' => '876',
            'sticky_title' => '戦略を考えるうえで大切なこと',
            'sticky_memo' => '戦略を考えるうえで大切になること\n\n\n行動の原理を見返すことで\n自分の行動原因などを考えることができる。\nその行動原因をいかに戦略に組み込むことができるかがポイントとなる',
            'created_at' => '2022-09-12 21:46:29',
            'updated_at' => '2022-09-12 21:46:29',
        ]);
        DB::table('sticky_registrations')->insert([
            'id' => '4',
            'user_book_id' => '3',
            'page_number' => '444',
            'sticky_title' => '聞き方のコツ',
            'sticky_memo' => '聞き方のコツは単純明快\n　　　↓\n聞くときに相槌を打つ\n　　　↓\n聞くときに、一番相手が何を聞いてほしいのかを考える。\n',
            'created_at' => '2022-09-12 21:46:29',
            'updated_at' => '2022-09-12 21:46:29',
        ]);
    }
}
