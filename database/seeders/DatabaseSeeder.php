<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CabangSeeder::class,
            PelangganSeeder::class,
            PegawaiSeeder::class,
            PengharumSeeder::class,
            LayananSeeder::class,
            TransaksiSeeder::class
        ]);
    }
}
