<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    public $timestamps      = false;
    protected $table        = 'transaksi';
    protected $primaryKey   = 'Nomor_Transaksi';

    protected $fillable = [
        'Nomor_Transaksi', 
        'Kd_Cabang', 
        'Id_Pelanggan', 
        'Kd_Layanan',
        'List_Layanan',
        'Jumlah_Barang',
        'Total_Bayar',
        'Kd_Pengharum',
        'Tanggal_Transaksi_Masuk',
        'Tanggal_Transaksi_Selesai',
        'Id_Pegawai'
    ];

    public function getListData($tgl_awal, $tgl_akhir) 
    {
        $query = DB::table('transaksi')
                    ->leftJoin('cabang', 'transaksi.Kd_Cabang', '=', 'cabang.Kd_Cabang')
                    ->leftJoin('pelanggan', 'transaksi.Id_Pelanggan', '=', 'pelanggan.Id_Pelanggan')
                    ->leftJoin('layanan', 'transaksi.Kd_Layanan', '=', 'layanan.Kd_Layanan')
                    ->leftJoin('pengharum', 'transaksi.Kd_Pengharum', '=', 'pengharum.Kd_Pengharum')
                    ->leftJoin('pegawai', 'transaksi.Id_Pegawai', '=', 'pegawai.Id_Pegawai')
                    ->whereBetween('Tanggal_Transaksi_Masuk', [$tgl_awal, $tgl_akhir])
                    ->orderBy('Tanggal_Transaksi_Masuk', 'desc');

        return $query;
    }

    public function getDetailData($nomor_transaksi) 
    {
        $query = DB::table('transaksi')
                    ->leftJoin('cabang', 'transaksi.Kd_Cabang', '=', 'cabang.Kd_Cabang')
                    ->leftJoin('pelanggan', 'transaksi.Id_Pelanggan', '=', 'pelanggan.Id_Pelanggan')
                    ->leftJoin('layanan', 'transaksi.Kd_Layanan', '=', 'layanan.Kd_Layanan')
                    ->leftJoin('pengharum', 'transaksi.Kd_Pengharum', '=', 'pengharum.Kd_Pengharum')
                    ->leftJoin('pegawai', 'transaksi.Id_Pegawai', '=', 'pegawai.Id_Pegawai')
                    ->where('Nomor_Transaksi', $nomor_transaksi);

        return $query;
    }

    public function generateNomorTransaksi()
    {
        $data = DB::table('transaksi')->where("Tanggal_Transaksi_Masuk", date("Y-m-d"))->orderBy('Nomor_Transaksi', 'desc')->first();
        
        $tgl = date("ymd");
        if(isset($data->Nomor_Transaksi))
        {
            $last_code      = $data->Nomor_Transaksi;
            $lastIncreament = substr($last_code, -3);
            $nomor_transaksi = 'T' . date('ymd') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);
        }
        else
        {
            $nomor_transaksi = "T" . $tgl . "001";
        }

        return $nomor_transaksi;
    }
}
