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
            'guru_id' => $this->faker->numberBetween(1, 20),
            'slot_id' => $this->faker->numberBetween(1, 45),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
