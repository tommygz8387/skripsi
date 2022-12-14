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
            'jml_jam' => $this->faker->numberBetween(7,9),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
