<?php

namespace Database\Seeders;

use App\Models\Pangkat;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class PangkatSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('seeders/pangkat.xlsx');
        $rows = SimpleExcelReader::create($file)->getRows();

        $rows->each(function (array $items) {
            Pangkat::create([
                'nama' => $items['nama'],
                'jenis' => $items['jenis'],
                'bobot' => $items['bobot'],
            ]);
        });
    }
}
