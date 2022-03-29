<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Region;
use App\Models\WorkField;
use App\Models\Candidate;

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
            'password' => bcrypt('12345'),
            'is_admin' => 1
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

        WorkField::create([
            'name' => 'Admin',
            'type' => 'Non Medical',
            'region_id' => 1
        ]);

        Candidate::create([
            'name' => 'Putu Adipa',
            'email' => 'adi@mail.com',
            'phone' => '089473687366',
            'place_birth' => 'Bali',
            'date_birth' => '1997/08/28',
            'studies' => 'ITB STIKOM Bali',
            'major' => 'Sistem Informasi',
            'edu_level' => 'Sarjana 1',
            'grad_year' => '2019',
            'study_certificate' => 'certif.jpg',
            'transcript' => 'transcript.jpg',
            'photo' => 'photo.jpg',
            'status' => 'Belum Diproses'
        ]);
    }
}
