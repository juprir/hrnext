<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(PangkatSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(MusimSeeder::class);
        $this->call(PeriodeMusimSeeder::class);
        $this->call(KetentuanKehadiranSeeder::class);
        $this->call(KategoriKehadiranSeeder::class);
        $this->call(JenisCutiSeeder::class);
        $this->call(AlasanCutiSeeder::class);
    }
}
