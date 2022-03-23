<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Region;
use App\Models\WorkField;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Adipa Agastya',
            'email' => 'adipa@omsamedic.com',
            'password' => bcrypt('12345')
        ]);

        Region::create([
            'name' => 'Bali'
        ]);

        Region::create([
            'name' => 'Laboan Bajo'
        ]);

        Region::create([
            'name' => 'Yogyakarta'
        ]);
    }
}
