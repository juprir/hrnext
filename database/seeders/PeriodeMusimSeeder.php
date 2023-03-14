<?php

namespace Database\Seeders;

use App\Models\PeriodeMusim;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class PeriodeMusimSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('seeders/periodemusim.xlsx');
        $rows = SimpleExcelReader::create($file)->getRows();

        $rows->each(function (array $items) {
            PeriodeMusim::create([
                'musim_id' => $items['musim_id'],
                'tanggal_awal' => $items['tanggal_awal'],
                'tanggal_akhir' => $items['tanggal_akhir'],
                'aktif' => $items['aktif'],
            ]);
        });
    }
}
