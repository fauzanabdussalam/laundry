<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Id_Pelanggan' => 1, 'Nama_Pelanggan' => 'Aris', 'No_HP_Pelanggan'  => '0895605298328', 'Alamat_Pelanggan' => 'Pasteur']
        ];

        foreach ($data as $d) 
        {
            DB::table('pelanggan')->insert($d);
        }
    }
}
