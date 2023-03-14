<?php

namespace Database\Seeders;

use App\Models\KategoriKehadiran;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class KategoriKehadiranSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('seeders/kategorikehadiran.xlsx');
        $rows = SimpleExcelReader::create($file)->getRows();

        $rows->each(function (array $items) {
            KategoriKehadiran::create([
                'nama' => $items['nama'],
                'melalui_pengajuan' => $items['melalui_pengajuan'],
                'hadir' => $items['hadir'],
                'tunjangan_kinerja_dipotong' => $items['tunjangan_kinerja_dipotong'],
                'batas_waktu_potongan' => $items['batas_waktu_potongan'],
                'satuan_waktu_potongan' => $items['satuan_waktu_potongan'],
                'persentase_potongan' => $items['persentase_potongan'],
            ]);
        });
    }
}
