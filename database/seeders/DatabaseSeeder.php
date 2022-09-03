<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Guru;
use \App\Models\Mapel;
use \App\Models\Kelas;
use \App\Models\Ruang;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // generate user
        User::factory(3)->create();
        User::factory()->create([
            'name' => 'Toms',
            'email' => 'toms@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        // generate seeder lain
        Guru::factory(10)->create();
        Mapel::factory(10)->create();
        Kelas::factory(10)->create();
        Ruang::factory(10)->create();

        $this->call([
            WaktuSeeder::class,
        ]);
    }
}
