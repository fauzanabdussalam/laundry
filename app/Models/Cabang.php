<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cabang extends Model
{
    public $timestamps      = false;
    protected $table        = 'cabang';
    protected $primaryKey   = 'Kd_Cabang';

    protected $fillable = [
        'Kd_Cabang', 'Nama_Cabang', 'Nomor_Telepon_Cabang', 'Alamat_Cabang'
    ];

    public function getListData() 
    {
        $query = DB::table('cabang')->orderBy('Nama_Cabang', 'asc');

        return $query;
    }

    public function getDetailData($kode) 
    {
        $query = DB::table('cabang')->where("Kd_Cabang", $kode);

        return $query;
    }
}
