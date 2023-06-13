<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matches')->insert([
            'title' => '手書き文字を交換「クセ字交換会」',
            'start_date' => now(),
            'end_date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
