<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PinjamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NamaPeminjam' => $this->faker->name,
            'NomorInduk' => $this->faker->ean13(),
            'WaktuPeminjaman' => $this->faker->time(),
            'LokasiPinjam' => $this->faker->numerify('Ruang-##'),
            'NamaBarang' => $this->faker->word,
            'KodeBarang' => $this->faker->randomNumber(5, true),
            'JumlahBarang' => $this->faker->biasedNumberBetween(1, 3),
        ];
    }
}
