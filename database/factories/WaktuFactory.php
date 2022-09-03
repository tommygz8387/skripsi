<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WaktuFactory extends Factory
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
            'jam_mulai' => $this->faker->unique()->numerify('##:##'),
            'jam_selesai' => $this->faker->unique()->numerify('##:##'),
            'total' => $this->faker->numberBetween(10, 60),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
