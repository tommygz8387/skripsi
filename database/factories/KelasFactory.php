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
            'tingkat' => $this->faker->numberBetween(10, 12),
            'jurusan' => $this->faker->word(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
