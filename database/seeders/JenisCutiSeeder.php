<?php

namespace Database\Seeders;

use App\Models\JenisCuti;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class JenisCutiSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('seeders/jeniscuti.xlsx');
        $rows = SimpleExcelReader::create($file)->getRows();

        $rows->each(function (array $items) {
            JenisCuti::create([
                'nama' => $items['nama'],
            ]);
        });
    }
}
