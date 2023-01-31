<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Jurusan::factory()->create([
            'jurusan' => 'IPA',
        ])->create([
            'jurusan' => 'IPS',
        ])->create([
            'jurusan' => 'Umum',
        ]);
    }
}
