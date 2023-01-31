<?php

namespace Database\Seeders;

use App\Models\Hari;
use App\Models\Slot;
use App\Models\Waktu;
use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder slot
        $hari=count(Hari::all());
        $waktu=count(Waktu::all());
        for ($i=1; $i <= $hari; $i++) { 
            for ($j=1; $j <= $waktu; $j++) { 
                Slot::factory()->create([
                    'hari_id' => $i,
                    'waktu_id' => $j,
                ]);
            }
        }
    }
}
