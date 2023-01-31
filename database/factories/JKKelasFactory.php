<?php

namespace Database\Factories;

use App\Models\Slot;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class JKKelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kelas=Kelas::pluck('id');
        $slot=Slot::pluck('id');
        return [
            //
            'kelas_id' => $this->faker->randomElement($kelas),
            'slot_id' => $this->faker->randomElement($slot),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
