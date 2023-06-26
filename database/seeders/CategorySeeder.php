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
            'title' => '動物',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => '食べ物',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => '自然',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => '季節',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => '仕事',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => '学校',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => '旅行',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'スポーツ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => '芸術',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => '音楽',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'その他',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
