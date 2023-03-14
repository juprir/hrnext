<?php

namespace Database\Seeders;

use App\Models\AlasanCuti;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class AlasanCutiSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('seeders/alasancuti.xlsx');
        $rows = SimpleExcelReader::create($file)->getRows();

        $rows->each(function (array $row) {
            AlasanCuti::create([
                'jenis' => $row['jenis'],
                'alasan' => $row['alasan'],
                'nama_bukti_dukung' => $row['nama_bukti_dukung'],
                'wajib_bukti_dukung' => $row['wajib_bukti_dukung'],
                'perlu_verifikasi' => $row['perlu_verifikasi'],
                'ada_saldo' => $row['ada_saldo'],
                'dapat_dibatalkan_per_hari' => $row['ada_saldo'],
                'maksimal_waktu' => $row['maksimal_waktu'],
                'jenis_waktu' => $row['jenis_waktu'],
                'syarat_lama_kerja_dalam_tahun' => $row['syarat_lama_kerja_dalam_tahun'],
            ]);
        });
    }
}
