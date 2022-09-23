<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TingkatFactory extends Factory
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
            'tingkat' => $this->faker->numberBetween(10, 12),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
