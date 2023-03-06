<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'panggilan' => $this->faker->firstName(),
            'gelar_depan' => $this->faker->randomElement(['', 'Dr.', 'Ir.', 'Drs.', 'Dra.']),
            'gelar_belakang' => $this->faker->randomElement(['', 'S.Kom', 'S.E', 'S.Tr.Kom.', 'S.T', 'M.Kom']),
            'nip' => $this->faker->numberBetween(100000, 999999),
            'nik' => $this->faker->numberBetween(100000, 999999),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-58 year', '-20 year'),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'golongan_darah' => $this->faker->randomElement(['A', 'B', 'AB']).$this->faker->randomElement(['+', '-']),
        ];
    }
}
