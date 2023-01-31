<?php

namespace Database\Seeders;

use App\Models\Hari;
use Illuminate\Database\Seeder;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder hari
        $data=['Senin','Selasa','Rabu','Kamis','Jum\'at'];
        $j=count($data);
        for ($i=1; $i <= $j; $i++) { 
            Hari::factory()->create([
            'hari' => $data[$i-1],
            'jml_jam' => '10',
            ]);
        }
    }
}
