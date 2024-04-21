<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name'    => 'プログラミング言語',
        ]);
        DB::table('categories')->insert([
            'name'    => 'ネットワーク全般',
        ]);
        DB::table('categories')->insert([
            'name'    => 'クラウド',
        ]);
        DB::table('categories')->insert([
            'name'    => 'サーバー',
        ]);
        DB::table('categories')->insert([
            'name'    => 'アルゴリズム',
        ]);
        DB::table('categories')->insert([
            'name'    => 'データベース',
        ]);
        DB::table('categories')->insert([
            'name'    => 'セキュリティ',
        ]);
        DB::table('categories')->insert([
            'name'    => 'マネジメント',
        ]);
        DB::table('categories')->insert([
            'name'    => 'その他・ポエム',
        ]);

    }
}
