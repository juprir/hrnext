<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $this->getRoles()->each(function ($permission) {
            Role::create([
                'name' => $permission['name'],
            ]);
        });

        $administratorRole = Role::where('name', 'Administrator')->first();
        $pengelolaKepegawaianRole = Role::where('name', 'Pengelola Kepegawaian')->first();

        $this->getPermissions()->each(function ($permission) use ($administratorRole, $pengelolaKepegawaianRole) {
            $administratorRole->givePermissionTo($permission['name']);
            $pengelolaKepegawaianRole->givePermissionTo($permission['name']);
        });

        $pejabatKepegawaianRole = Role::where('name', 'Pejabat Kepegawaian')->first();
        $pejabatKepegawaianRole->givePermissionTo('Melihat data kehadiran pegawai per bulan');
        $pejabatKepegawaianRole->givePermissionTo('Melihat laporan kehadiran per bulan');
        $pejabatKepegawaianRole->givePermissionTo('Melihat laporan kehadiran per hari');
    }

    public function getRoles()
    {
        return collect([
            ['name' => 'Administrator'],
            ['name' => 'Pengelola Kepegawaian'],
            ['name' => 'Pejabat Kepegawaian'],
            ['name' => 'Pegawai'],
        ]);
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
