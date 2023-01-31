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
        $guru=Guru::pluck('id');
        $slot=Slot::pluck('id');
        return [
            //
            'guru_id' => $this->faker->randomElement($guru),
            'slot_id' => $this->faker->randomElement($slot),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
