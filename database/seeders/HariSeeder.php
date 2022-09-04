<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Hari;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Hari::factory()->create([
            'hari' => 'Senin',
        ]);
        Hari::factory()->create([
            'hari' => 'Selasa',
        ]);
        Hari::factory()->create([
            'hari' => 'Rabu',
        ]);
        Hari::factory()->create([
            'hari' => 'Kamis',
        ]);
        Hari::factory()->create([
            'hari' => 'Jum\'at',
        ]);
    }
}
