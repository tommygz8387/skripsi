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
        // generate factory
        User::factory(3)->create();
        Guru::factory(10)->create();
        Ruang::factory()->create([
            'nama' => 'Kelas',
            'kode' => 'K01',
        ]);
        Ruang::factory(10)->create();

        // custom seeder
        User::factory()->create([
            'name' => 'Toms',
            'email' => 'toms@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        // seeder waktu
        Waktu::factory()->create([
            'jam_mulai' => '07:15',
            'jam_selesai' => '08:00',
            'total' => '45',
        ])->create([
            'jam_mulai' => '08:00',
            'jam_selesai' => '08:45',
            'total' => '45',
        ])->create([
            'jam_mulai' => '08:45',
            'jam_selesai' => '09:30',
            'total' => '45',
        ])->create([
            'jam_mulai' => '09:45',
            'jam_selesai' => '10:30',
            'total' => '45',
        ])->create([
            'jam_mulai' => '10:30',
            'jam_selesai' => '11:15',
            'total' => '45',
        ])->create([
            'jam_mulai' => '11:15',
            'jam_selesai' => '12:00',
            'total' => '45',
        ])->create([
            'jam_mulai' => '12:30',
            'jam_selesai' => '13:15',
            'total' => '45',
        ])->create([
            'jam_mulai' => '13:15',
            'jam_selesai' => '14:00',
            'total' => '45',
        ])->create([
            'jam_mulai' => '14:00',
            'jam_selesai' => '14:45',
            'total' => '45',
        ])->create([
            'jam_mulai' => '14:45',
            'jam_selesai' => '15:30',
            'total' => '45',
        ]);

        // seeder tingkat
        for ($i=10; $i <= 12; $i++) { 
            Tingkat::factory()->create([
            'tingkat' => $i,
            ]);
        }

        // seeder hari
        $data=['Senin','Selasa','Rabu','Kamis','Jum\'at'];
        $j=count($data);
        for ($i=1; $i <= $j; $i++) { 
            Hari::factory()->create([
            'hari' => $data[$i-1],
            'jml_jam' => '10',
            ]);
        }

        // relationship seeder
        Jurusan::factory()->create([
                'id'=>'0',
                'jurusan'=>'Umum'
            ]);
        Jurusan::factory(5)
            ->has(Mapel::factory()->count(3), 'mapel')
            ->has(Kelas::factory()->count(3), 'kelas')
            ->create();
        // Kelas::factory()
        //     ->count(3)
        //     ->for($j)
        //     ->create();

        // generate seeder lain
        // $this->call([
        //     WaktuSeeder::class,
        //     HariSeeder::class,
        //     SlotSeeder::class,
        //     TingkatSeeder::class,
        // ]);

        // seeder slot
        $hari=count(Hari::all());
        $waktu=count(Waktu::all());
        for ($i=1; $i <= $hari; $i++) { 
            for ($j=1; $j <= $waktu; $j++) { 
                Slot::factory()->create([
                    'hari_id' => $i,
                    'waktu_id' => $j,
                ]);
            }
        }

        JKhusus::factory(20)->create();
        Ampu::factory(40)->create();
        Manual::factory(50)->create();
    }
}
