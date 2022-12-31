<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Guru;
use \App\Models\Mapel;
use \App\Models\Kelas;
use \App\Models\Ruang;
use \App\Models\Jurusan;
use \App\Models\Slot;
use \App\Models\Hari;
use \App\Models\JKhusus;
use \App\Models\Manual;
use \App\Models\Ampu;
use \App\Models\Waktu;
use \App\Models\Tingkat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        User::factory()->create([
            'name' => 'Toms',
            'email' => 'toms@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        
        Jurusan::factory()->create([
            'jurusan' => 'Umum',
        ]);

        Ruang::factory()->create([
            'nama' => 'Kelas',
            'kode' => 'K',
        ]);

        for ($i=10; $i <= 12; $i++) { 
            Tingkat::factory()->create([
            'tingkat' => $i,
            ]);
        }

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
