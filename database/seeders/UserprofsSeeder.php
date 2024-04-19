<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserprofsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('userprofs')->insert([
            'user_id'    => 1,
            'address'    => "江戸川区本一色",
            'phone'  => '090-3685-5599',
            'github_url'  => 'https://github.com/ysk',
        ]);

        DB::table('userprofs')->insert([
            'user_id'    => 2,
            'address'    => "杉並区天沼",
            'phone'  => '090-0022-4455',
            'github_url'  => 'https://github.com/ysk',
        ]);

        DB::table('userprofs')->insert([
            'user_id'    => 3,
            'address'    => "世田谷区北烏山",
            'phone'  => '090-9988-3569',
            'github_url'  => 'https://github.com/ysk',
        ]);



    }
}
