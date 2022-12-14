<?php

namespace Database\Factories;

use App\Models\Guru;
use App\Models\Slot;
use Illuminate\Database\Eloquent\Factories\Factory;

class JKhususFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $guru=count(Guru::all());
        $slot=count(Slot::all());
        return [
            //
            'guru_id' => $this->faker->numberBetween(1, $guru),
            'slot_id' => $this->faker->numberBetween(1, $slot),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
