<?php

namespace Database\Seeders;

use App\Models\Musim;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class MusimSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('seeders/musim.xlsx');
        $rows = SimpleExcelReader::create($file)->getRows();

        $rows->each(function (array $items) {
            Musim::create([
                'nama' => $items['nama'],
                'default' => $items['default'],
            ]);
        });
    }
}
