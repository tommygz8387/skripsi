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
            'slot_id' => $this->faker->numberBetween(1, 50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
