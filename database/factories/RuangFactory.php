<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RuangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->unique()->word(),
            'kode' => $this->faker->unique()->bothify('??###'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
