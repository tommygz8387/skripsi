<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SlotFactory extends Factory
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
            'hari_id' => $this->faker->numberBetween(1, 12),
            'waktu_id' => $this->faker->numberBetween(1, 12),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
