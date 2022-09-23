<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Slot;
use \App\Models\Hari;
use \App\Models\Waktu;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $hari=count(Hari::all());
        // $waktu=count(Waktu::all());
        // for ($i=1; $i <= $hari; $i++) { 
        //     for ($j=1; $j <= $waktu; $j++) { 
        //         Slot::factory()->create([
        //             'hari_id' => $i,
        //             'waktu_id' => $j,
        //         ]);
        //     }
        // }
        // Slot::factory()->create([
        //     'hari_id' => '1',
        //     'waktu_id' => '1',
        // ])->create([
        //     'hari_id' => '1',
        //     'waktu_id' => '2',
        // ])->create([
        //     'hari_id' => '1',
        //     'waktu_id' => '3',
        // ])->create([
        //     'hari_id' => '1',
        //     'waktu_id' => '4',
        // ])->create([
        //     'hari_id' => '1',
        //     'waktu_id' => '5',
        // ])->create([
        //     'hari_id' => '1',
        //     'waktu_id' => '6',
        // ])->create([
        //     'hari_id' => '1',
        //     'waktu_id' => '7',
        // ])->create([
        //     'hari_id' => '1',
        //     'waktu_id' => '8',
        // ])->create([
        //     'hari_id' => '1',
        //     'waktu_id' => '9',
        // ])->create([
        //     'hari_id' => '1',
        //     'waktu_id' => '10',
        // ])->create([
        //     'hari_id' => '2',
        //     'waktu_id' => '1',
        // ])->create([
        //     'hari_id' => '2',
        //     'waktu_id' => '2',
        // ])->create([
        //     'hari_id' => '2',
        //     'waktu_id' => '3',
        // ])->create([
        //     'hari_id' => '2',
        //     'waktu_id' => '4',
        // ])->create([
        //     'hari_id' => '2',
        //     'waktu_id' => '5',
        // ])->create([
        //     'hari_id' => '2',
        //     'waktu_id' => '6',
        // ])->create([
        //     'hari_id' => '2',
        //     'waktu_id' => '7',
        // ])->create([
        //     'hari_id' => '2',
        //     'waktu_id' => '8',
        // ])->create([
        //     'hari_id' => '2',
        //     'waktu_id' => '9',
        // ])->create([
        //     'hari_id' => '2',
        //     'waktu_id' => '10',
        // ])->create([
        //     'hari_id' => '3',
        //     'waktu_id' => '1',
        // ])->create([
        //     'hari_id' => '3',
        //     'waktu_id' => '2',
        // ])->create([
        //     'hari_id' => '3',
        //     'waktu_id' => '3',
        // ])->create([
        //     'hari_id' => '3',
        //     'waktu_id' => '4',
        // ])->create([
        //     'hari_id' => '3',
        //     'waktu_id' => '5',
        // ])->create([
        //     'hari_id' => '3',
        //     'waktu_id' => '6',
        // ])->create([
        //     'hari_id' => '3',
        //     'waktu_id' => '7',
        // ])->create([
        //     'hari_id' => '3',
        //     'waktu_id' => '8',
        // ])->create([
        //     'hari_id' => '3',
        //     'waktu_id' => '9',
        // ])->create([
        //     'hari_id' => '3',
        //     'waktu_id' => '10',
        // ])->create([
        //     'hari_id' => '4',
        //     'waktu_id' => '1',
        // ])->create([
        //     'hari_id' => '4',
        //     'waktu_id' => '2',
        // ])->create([
        //     'hari_id' => '4',
        //     'waktu_id' => '3',
        // ])->create([
        //     'hari_id' => '4',
        //     'waktu_id' => '4',
        // ])->create([
        //     'hari_id' => '4',
        //     'waktu_id' => '5',
        // ])->create([
        //     'hari_id' => '4',
        //     'waktu_id' => '6',
        // ])->create([
        //     'hari_id' => '4',
        //     'waktu_id' => '7',
        // ])->create([
        //     'hari_id' => '4',
        //     'waktu_id' => '8',
        // ])->create([
        //     'hari_id' => '4',
        //     'waktu_id' => '9',
        // ])->create([
        //     'hari_id' => '4',
        //     'waktu_id' => '10',
        // ])->create([
        //     'hari_id' => '5',
        //     'waktu_id' => '1',
        // ])->create([
        //     'hari_id' => '5',
        //     'waktu_id' => '2',
        // ])->create([
        //     'hari_id' => '5',
        //     'waktu_id' => '3',
        // ])->create([
        //     'hari_id' => '5',
        //     'waktu_id' => '4',
        // ])->create([
        //     'hari_id' => '5',
        //     'waktu_id' => '5',
        // ])->create([
        //     'hari_id' => '5',
        //     'waktu_id' => '6',
        // ])->create([
        //     'hari_id' => '5',
        //     'waktu_id' => '8',
        // ])->create([
        //     'hari_id' => '5',
        //     'waktu_id' => '9',
        // ])->create([
        //     'hari_id' => '5',
        //     'waktu_id' => '10',
        // ]);
    }
}
