<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Kd_Cabang' => '04/94', 'Nama_Cabang' => 'Apartment Buah Batu Park Tower D Lt. Dasar No. 19', 'Nomor_Telepon_Cabang'  => '02287506490', 'Alamat_Cabang' => 'Jl. Adhiyaksa Raya 1 Bandung'],
            ['Kd_Cabang' => '04/90', 'Nama_Cabang' => 'Batununggal', 'Nomor_Telepon_Cabang' => '081385824576', 'Alamat_Cabang' => 'Jl. Ters Batununggal No. 3'],
            ['Kd_Cabang' => '04/100', 'Nama_Cabang' => 'Sukapura', 'Nomor_Telepon_Cabang'  => '087825025627', 'Alamat_Cabang' => 'Jl. Sukapura Perum Palem 2 Blok B2 No. 3']
        ];

        foreach ($data as $d) 
        {
            DB::table('cabang')->insert($d);
        }
    }
}