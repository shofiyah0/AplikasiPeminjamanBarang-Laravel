<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NamaBarang' => $this->faker->word,
            'KodeBarang' => $this->faker->randomNumber(5, true),
            'JumlahBarang' => $this->faker->biasedNumberBetween(1, 3),
        ];
    }
}
