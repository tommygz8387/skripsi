<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Waktu;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Waktu::factory()->create([
            'jam_mulai' => '07:15',
            'jam_selesai' => '08:00',
            'total' => '45',
        ]);
        Waktu::factory()->create([
            'jam_mulai' => '08:00',
            'jam_selesai' => '08:45',
            'total' => '45',
        ]);
        Waktu::factory()->create([
            'jam_mulai' => '08:45',
            'jam_selesai' => '09:30',
            'total' => '45',
        ]);
        Waktu::factory()->create([
            'jam_mulai' => '09:45',
            'jam_selesai' => '10:30',
            'total' => '45',
        ]);
        Waktu::factory()->create([
            'jam_mulai' => '10:30',
            'jam_selesai' => '11:15',
            'total' => '45',
        ]);
        Waktu::factory()->create([
            'jam_mulai' => '11:15',
            'jam_selesai' => '12:00',
            'total' => '45',
        ]);
        Waktu::factory()->create([
            'jam_mulai' => '12:30',
            'jam_selesai' => '13:15',
            'total' => '45',
        ]);
        Waktu::factory()->create([
            'jam_mulai' => '13:15',
            'jam_selesai' => '14:00',
            'total' => '45',
        ]);
        Waktu::factory()->create([
            'jam_mulai' => '14:00',
            'jam_selesai' => '14:45',
            'total' => '45',
        ]);
        Waktu::factory()->create([
            'jam_mulai' => '14:45',
            'jam_selesai' => '15:30',
            'total' => '45',
        ]);
    }
}
