<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengharumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Kd_Pengharum' => 'PLX', 'Nama_Pengharum' => 'Pilux']
        ];

        foreach ($data as $d) 
        {
            DB::table('pengharum')->insert($d);
        }
    }
}
