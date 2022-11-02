<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AmpuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guru_id' => $this->faker->numberBetween(1, 50),
            'mapel_id' => $this->faker->numberBetween(1, 15),
            'tingkat_id' => $this->faker->numberBetween(1, 3),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
