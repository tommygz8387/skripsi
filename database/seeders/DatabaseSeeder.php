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
        Ruang::factory(10)->create();

        // custom seeder
        User::factory()->create([
            'name' => 'Toms',
            'email' => 'toms@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        // relationship seeder
        Jurusan::factory(5)
            ->has(Mapel::factory()->count(3), 'mapel')
            ->has(Kelas::factory()->count(3), 'kelas')
            ->create();
        // Jurusan::factory(5)
        //     ->has(Kelas::factory()->count(3), 'kelas')
        //     ->create();
        // Kelas::factory()
        //     ->count(3)
        //     ->for($j)
        //     ->create();

        // generate seeder lain
        $this->call([
            WaktuSeeder::class,
            HariSeeder::class,
            SlotSeeder::class,
        ]);
        $jml=count(Hari::all());
        for ($i=1; $i <= $jml; $i++) { 
            $data=count(Slot::where('hari_id',$i)->get());
            // $newData=DB::select(`select * from haris where id = ?`, [$i]);
            DB::update('UPDATE haris SET sisa = jml_jam-? WHERE id = ?',[$data,$i]);
        }

        JKhusus::factory(10)->create();
    }
}
