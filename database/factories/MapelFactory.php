<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MapelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->jobTitle(),
            'kode' => $this->faker->unique()->bothify('??###'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
