<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nip' => $this->faker->unique()->randomNumber(5, true),
            'no_tlp' => $this->faker->unique()->numerify('08##########'),
            'jml_ampu' => $this->faker->numberBetween(7, 36),
            'keterangan' => $this->faker->sentence(2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
