<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $this->getPermissions()->each(function ($permission) {
            Permission::create([
                'name' => $permission['name'],
            ]);
        });
    }

    public function getPermissions()
    {
        return collect([
            ['name' => 'Menambahkan ID sidik jari'],
            ['name' => 'Mengubah ID sidik jari'],
            ['name' => 'Menghapus ID sidik jari'],
            ['name' => 'Melihat data kehadiran pegawai per bulan'],
            ['name' => 'Melihat laporan kehadiran per bulan'],
            ['name' => 'Melihat laporan kehadiran per hari'],
            ['name' => 'Memverifikasi cuti'],

        ]);
    }
}
