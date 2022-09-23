<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->unique()->bothify('##??#'),
            'tingkat_id' => $this->faker->numberBetween(1, 3),
            'jurusan_id' => $this->faker->numberBetween(0, 12),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
