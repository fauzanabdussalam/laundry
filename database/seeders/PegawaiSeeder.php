<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Id_Pegawai' => 1, 'Nama_Pegawai' => 'Adam', 'Jenis_Kelamin'  => 'Laki-Laki', 'Kd_Cabang' => '04/94']
        ];

        foreach ($data as $d) 
        {
            DB::table('pegawai')->insert($d);
        }
    }
}
