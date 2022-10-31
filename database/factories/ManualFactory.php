<?php

namespace Database\Factories;

use App\Models\Ampu;
use App\Models\Slot;
use App\Models\Kelas;
use App\Models\Ruang;
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
        $Ampu = count(Ampu::all());
        $Kelas = count(Kelas::all());
        $Ruang = count(Ruang::all());
        $Slot = count(Slot::all());
        return [
            //
            'ampu_id' => $this->faker->numberBetween(1, $Ampu),
            'kelas_id' => $this->faker->numberBetween(1, $Kelas),
            'ruang_id' => $this->faker->numberBetween(1, $Ruang),
            'slot_id' => $this->faker->numberBetween(1, $Slot),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
