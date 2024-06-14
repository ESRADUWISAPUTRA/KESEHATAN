<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $kategori = ['Antibiotik', 'Analgesik', 'Antihistamin', 'Suplemen', 'Herbal'];
        for ($i = 1; $i <= 100; $i++) 
        {
            DB::table('jadwal')->insert([
                'nama' => $faker->words(3, true),
                'deskripsi' => $faker->paragraph,
                'dosis' => $faker->sentence,
                'jadwal_minum' => $faker->time('H:i'),
                'kategori' => $faker->randomElement($kategori),
                'gambar' => 'default.jpg', // assuming you have a default image
            ]);
        }
    }
}

