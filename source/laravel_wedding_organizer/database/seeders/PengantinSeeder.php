<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengantinSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengantins')->insert([
            'nama_pria' => 'Rizki Fajar',
            'nama_wanita' => 'Ayu Amelia',
            'tanggal_nikah' => '2026-01-15',
            'tempat' => 'Kota Banda Aceh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
