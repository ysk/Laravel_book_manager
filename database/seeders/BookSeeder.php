<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'user_id'    => 1,
            'item_name'    => "アルゴリズムとデータ構造",
            'item_number'  => 1,
            'item_amount'  => 3000,
            'published'  => '2024-04-23 21:18:27',
        ]);

        DB::table('books')->insert([
            'user_id'    => 2,
            'item_name'    => "運用改善の教科書",
            'item_number'  => 2,
            'item_amount'  => 2980,
            'published'  => '2024-04-12 21:18:27',
        ]);

        DB::table('books')->insert([
            'user_id'    => 3,
            'item_name'    => "AWS運用入門",
            'item_number'  => 3,
            'item_amount'  => 3300,
            'published'  => '2020-02-12 21:18:27',
        ]);
        DB::table('books')->insert([
            'user_id'    => 4,
            'item_name'    => "アルゴリズムとデータ構造",
            'item_number'  => 1,
            'item_amount'  => 3000,
            'published'  => '2024-04-23 21:18:27',
        ]);

        DB::table('books')->insert([
            'user_id'    => 5,
            'item_name'    => "運用改善の教科書",
            'item_number'  => 2,
            'item_amount'  => 2980,
            'published'  => '2024-04-12 21:18:27',
        ]);

        DB::table('books')->insert([
            'user_id'    => 6,
            'item_name'    => "AWS運用入門",
            'item_number'  => 3,
            'item_amount'  => 3300,
            'published'  => '2020-02-12 21:18:27',
        ]);


    }
}
