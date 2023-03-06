<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('seeders/jabatan.xlsx');
        $rows = SimpleExcelReader::create($file)->getRows();

        $rows->each(function (array $row) {
            Jabatan::create([
                'nama' => $row['nama'],
                'jenis' => $row['jenis'],
                'grade' => $row['grade'],
                'kategori' => $row['kategori'],
            ]);
        });
    }
}
