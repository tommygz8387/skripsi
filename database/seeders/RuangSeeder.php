<?php

namespace Database\Seeders;

use App\Models\Ruang;
use Illuminate\Database\Seeder;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ruang::factory()->create([
            'nama' => 'Kelas',
            'kode' => 'K',
        ]);
        Ruang::factory()->create([
            'nama' => 'R.Lab IPA',
            'kode' => 'RL IPA',
        ]);
        Ruang::factory()->create([
            'nama' => 'R.Lab Komputer',
            'kode' => 'RL Kom',
        ]);
        Ruang::factory()->create([
            'nama' => 'Lapangan',
            'kode' => 'L',
        ]);
    }
}
