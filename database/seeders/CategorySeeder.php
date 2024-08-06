<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'category_wisata' => 'Wisata Alam',
            'created_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'category_wisata' => 'Wisata Budaya',
            'created_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'category_wisata' => 'Wisata Minat Khusus',
            'created_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'category_wisata' => 'Wisata Religi',
            'created_at' => Carbon::now(),
        ]);
    }
}
