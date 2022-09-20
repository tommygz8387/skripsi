<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JKhususFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'guru_id' => $this->faker->numberBetween(1, 10),
            'hari_id' => $this->faker->numberBetween(1, 5),
            'waktu_id' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
