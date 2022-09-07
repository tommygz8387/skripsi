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
            'jml_jam' => '10',
        ]);
        Hari::factory()->create([
            'hari' => 'Selasa',
            'jml_jam' => '10',
        ]);
        Hari::factory()->create([
            'hari' => 'Rabu',
            'jml_jam' => '10',
        ]);
        Hari::factory()->create([
            'hari' => 'Kamis',
            'jml_jam' => '10',
        ]);
        Hari::factory()->create([
            'hari' => 'Jum\'at',
            'jml_jam' => '8',
        ]);
    }
}
