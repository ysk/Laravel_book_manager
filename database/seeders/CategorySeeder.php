<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'プログラミング言語',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'ネットワーク全般',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'クラウド',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'name' => 'サーバー',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 5,
                'name' => 'アルゴリズム',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'name' => 'データベース',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 7,
                'name' => 'セキュリティ',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 8,
                'name' => 'マネジメント',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 9,
                'name' => 'その他・ポエム',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}
