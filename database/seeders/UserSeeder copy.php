<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'YusukeIkeda',
                'email' => 'yusuke.micmic@gmail.com',
                'password' => Hash::make('raraparu'),
                'text' => 'ここにレビューを書きます',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'name' => 'YusukeIkeda',
                'email' => 'yusuke.micmic2@gmail.com',
                'password' => Hash::make('raraparu'),
                'text' => 'ここにレビューを書きます',
                'created_at' => null,
                'updated_at' => null,
            ]
        ]);
    }
}
