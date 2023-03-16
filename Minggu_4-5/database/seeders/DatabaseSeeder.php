<?php

namespace Database\Seeders;

use App\Models\DetailProfile;
use Illuminate\Database\Seeder;
use Database\Seeders\DetailProfileSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     DetailProfileSeeder::class
        // ]);
        DetailProfile::create([
            'address' => 'Jember',
            'no_hp' => '082330926778',
            'ttl' => '2002-11-18',
            'photos' => 'akbar.jpg'
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
