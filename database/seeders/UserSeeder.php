<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'firstname' => '晃',
            'lastname' => '上田',
            'nickname' => 'LightStar',
            'postal_code' => '7000913',
            'prefectures' => '岡山県',
            'house_number' => '岡山市北区',
            'building_name' => '大供',
            'profile_complete_state' => '1',
            'email' => 'robogirl9032-dogger@yahoo.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('superadmin'),
            'remember_token' => Str::random(64),
            'twitter' => 'https://twitter.com/example',
            'instagram' => 'https://www.instagram.com/example',
            'tiktok' => 'https://www.tiktok.com/@example',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
