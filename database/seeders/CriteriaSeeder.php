<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('criterias')->insert([
            'kode_atribut' => 'C1',
            'nama_atribut' => 'Lokasi',
            'atribut' => '40',
            'keterangan' => 'Benefit',
            'created_at' => Carbon::now(),
        ]);

        DB::table('criterias')->insert([
            'kode_atribut' => 'C2',
            'nama_atribut' => 'Jarak',
            'atribut' => '30',
            'keterangan' => 'Benefit',
            'created_at' => Carbon::now(),
        ]);

        DB::table('criterias')->insert([
            'kode_atribut' => 'C3',
            'nama_atribut' => 'Biaya',
            'atribut' => '20',
            'keterangan' => 'Cost',
            'created_at' => Carbon::now(),
        ]);

        DB::table('criterias')->insert([
            'kode_atribut' => 'C4',
            'nama_atribut' => 'Fasilitas',
            'atribut' => '10',
            'keterangan' => 'Benefit',
            'created_at' => Carbon::now(),
        ]);
    }
}
