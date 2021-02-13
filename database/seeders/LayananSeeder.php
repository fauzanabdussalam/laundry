<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Kd_Layanan' => 'CKMPL', 'Nama_Layanan' => 'Cuci Komplit', 'Tarif'  => 8000]
        ];

        foreach ($data as $d) 
        {
            DB::table('layanan')->insert($d);
        }
    }
}
