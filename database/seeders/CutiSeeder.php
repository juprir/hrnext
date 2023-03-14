<?php

namespace Database\Seeders;

use App\Models\Cuti;
use Illuminate\Database\Seeder;

class CutiSeeder extends Seeder
{
    public function run(): void
    {
        Cuti::create([
            'pegawai_id' => 4,
            'tanggal_mulai' => '01-03-2023',
            'tanggal_selesai' => '01-03-2023',
            'status' => 'verified',
            'jenis_cuti_id' => 1,
            'alasan_cuti_id' => 1,
        ]);
    }
}
