<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ManualFactory extends Factory
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
            'ampu_id' => $this->faker->numberBetween(1, 40),
            'kelas_id' => $this->faker->numberBetween(1, 5),
            'ruang_id' => $this->faker->numberBetween(1, 5),
            'slot_id' => $this->faker->numberBetween(1, 50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
