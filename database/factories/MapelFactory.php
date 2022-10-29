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
            'nama' => $this->faker->unique->jobTitle(),
            'jurusan_id' => $this->faker->numberBetween(1, 12),
            'ampu1' => $this->faker->numberBetween(0, 21),
            'ampu2' => $this->faker->numberBetween(0, 21),
            'ampu3' => $this->faker->numberBetween(0, 21),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
