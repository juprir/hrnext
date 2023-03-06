<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class UserSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('seeders/user.xlsx');
        $rows = SimpleExcelReader::create($file)->getRows();

        $rows->each(function (array $row) {
            $user = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => $row['password'],
            ]);
        });
    }
}
