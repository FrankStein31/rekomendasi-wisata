<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weights')->insert([
            'id_criteria' => '1',
            'nama_bobot' => 'Sangat Strategis',
            'bobot' => '5',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '1',
            'nama_bobot' => 'Strategis',
            'bobot' => '4',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '1',
            'nama_bobot' => 'Cukup Strategis',
            'bobot' => '3',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '1',
            'nama_bobot' => 'Kurang Strategis',
            'bobot' => '2',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '1',
            'nama_bobot' => 'Tidak Strategis',
            'bobot' => '1',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '2',
            'nama_bobot' => 'Sangat Dekat',
            'bobot' => '5',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '2',
            'nama_bobot' => 'Dekat',
            'bobot' => '4',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '2',
            'nama_bobot' => 'Sedang',
            'bobot' => '3',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '2',
            'nama_bobot' => 'Jauh',
            'bobot' => '2',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '2',
            'nama_bobot' => 'Sangat Jauh',
            'bobot' => '1',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '3',
            'nama_bobot' => 'Sangat Mahal',
            'bobot' => '5',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '3',
            'nama_bobot' => 'Mahal',
            'bobot' => '4',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '3',
            'nama_bobot' => 'Sedang',
            'bobot' => '3',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '3',
            'nama_bobot' => 'Murah',
            'bobot' => '2',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '3',
            'nama_bobot' => 'Free',
            'bobot' => '1',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '4',
            'nama_bobot' => '5 Fasilitas: Tempat parkir; Wahana bermain anak; Toilet;
            Tempat Ibadah, Kantin',
            'bobot' => '5',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '4',
            'nama_bobot' => '4 Fasilitas: Tempat parkir; Kantin; Toilet; Tempat Ibadah',
            'bobot' => '4',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '4',
            'nama_bobot' => '3 Fasilitas: Tempat parkir; Tempat Istirahat; Toilet',
            'bobot' => '3',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '4',
            'nama_bobot' => '2 Fasilitas: Tempat parkir; Toilet',
            'bobot' => '2',
            'created_at' => Carbon::now(),
        ]);

        DB::table('weights')->insert([
            'id_criteria' => '4',
            'nama_bobot' => '1 Fasilitas: Tempat parkir',
            'bobot' => '1',
            'created_at' => Carbon::now(),
        ]);
        
    }
}
