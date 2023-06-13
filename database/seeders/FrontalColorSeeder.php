<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontalColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('frontal_colors')->insert([
            'title' => '白',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => 'グリシェル',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => 'キウイ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => 'みかん',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => '金茶（黄）',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => 'ベリル（緑）',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => 'スカイ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => 'アイリス（青）',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => '銀糸・鉄紺',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => '銀糸・小豆',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => '紅（赤）',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => 'えんじ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => 'こげ茶',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => '黒',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('frontal_colors')->insert([
            'title' => 'クラフト',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
