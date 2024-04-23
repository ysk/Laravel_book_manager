<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserprofsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('userprofs')->insert([
            [
                'user_id' => 1,
                'address' => '江戸川区本一色',
                'phone' => '090-3685-5599',
                'github_url' => 'https://github.com/ysk',
            ],
            [
                'user_id' => 2,
                'address' => '杉並区天沼',
                'phone' => '090-0022-4455',
                'github_url' => 'https://github.com/ysk',
            ],
            [
                'user_id' => 3,
                'address' => '世田谷区北烏山',
                'phone' => '090-9988-3569',
                'github_url' => 'https://github.com/ysk',
            ],
        ]);
    }
}
