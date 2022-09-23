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
        // $data=['Senin','Selasa','Rabu','Kamis','Jum\'at'];
        // $j=count($data);
        // for ($i=1; $i <= $j; $i++) { 
        //     Hari::factory()->create([
        //     'hari' => $data[$i-1],
        //     'jml_jam' => '10',
        //     ]);
        // }
        // Hari::factory()->create([
        //     'hari' => 'Senin',
        //     'jml_jam' => '10',
        // ])->create([
        //     'hari' => 'Selasa',
        //     'jml_jam' => '10',
        // ])->create([
        //     'hari' => 'Rabu',
        //     'jml_jam' => '10',
        // ])->create([
        //     'hari' => 'Kamis',
        //     'jml_jam' => '10',
        // ])->create([
        //     'hari' => 'Jum\'at',
        //     'jml_jam' => '10',
        // ]);
    }
}
