<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HariFactory extends Factory
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
            'hari' => $this->faker->word(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
