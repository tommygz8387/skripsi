<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JurusanFactory extends Factory
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
            'jurusan' => $this->faker->unique()->jobTitle(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
