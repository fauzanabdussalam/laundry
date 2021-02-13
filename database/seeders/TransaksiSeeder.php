<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi')->insert([
            'Nomor_Transaksi'           => '11/051', 
            'Kd_Cabang'                 => '04/94',
            'Id_Pelanggan'              => 1,
            'Kd_Layanan'                => 'CKMPL',
            'Jumlah_Barang'             => 7.045,
            'Total_Bayar'               => 56350,
            'Kd_Pengharum'              => 'PLX',
            'Tanggal_Transaksi_Masuk'   => NOW(), 
            'Tanggal_Transaksi_Selesai' => NOW(),
            'Id_Pegawai'                => 1
        ]);
    }
}
