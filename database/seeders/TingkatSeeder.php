<?php

namespace Database\Seeders;

use App\Models\Tingkat;
use Illuminate\Database\Seeder;

class TingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // seeder tingkat
        for ($i=10; $i <= 12; $i++) { 
            Tingkat::factory()->create([
            'tingkat' => $i,
            ]);
        }
    }
}
