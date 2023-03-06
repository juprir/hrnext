<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('seeders/pegawai.xlsx');
        $rows = SimpleExcelReader::create($file)->getRows();

        $rows->each(function (array $items) {
            Pegawai::create([
                'nama' => $items['nama'],
                'user_id' => $items['user_id'],
                'nip' => $items['nip'],
                'pangkat_id' => $items['pangkat_id'],
                'jabatan_id' => $items['jabatan_id'],
                'unit_organisasi_id' => $items['unit_organisasi_id'],
                'atasan_id' => $items['atasan_id'],
                'id_sidik_jari' => $items['id_sidik_jari'],
                'terakhir_mulai_aktif_kerja' => $items['terakhir_mulai_aktif_kerja'],
            ]);
        });
    }
}
