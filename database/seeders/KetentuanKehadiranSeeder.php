<?php

namespace Database\Seeders;

use App\Models\KetentuanKehadiran;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class KetentuanKehadiranSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('seeders/ketentuankehadiran.xlsx');
        $rows = SimpleExcelReader::create($file)->getRows();

        $rows->each(function (array $items) {
            KetentuanKehadiran::create([
                'musim_id' => $items['musim_id'],
                'hari' => $items['hari'],
                'waktu_datang' => $items['waktu_datang'],
                'waktu_pulang' => $items['waktu_pulang'],
                'toleransi_keterlambatan' => $items['toleransi_keterlambatan'],
            ]);
        });
    }
}
