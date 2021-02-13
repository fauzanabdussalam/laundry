<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pegawai extends Model
{  
    public $timestamps      = false;
    protected $table        = 'pegawai';
    protected $primaryKey   = 'Id_Pegawai';

    protected $fillable = [
        'Nama_Pegawai', 'Jenis_Kelamin', 'Kd_Cabang'
    ];

    public function getListData($kd_cabang = "") 
    {
        $query = DB::table('pegawai')
                    ->leftJoin('cabang', 'cabang.Kd_Cabang', '=', 'pegawai.Kd_Cabang')
                    ->select('pegawai.*', 'cabang.Nama_Cabang as cabang')
                    ->orderBy('Nama_Pegawai', 'asc');

        if(!empty($kd_cabang))
        {
            $query = $query->where('pegawai.Kd_Cabang', $kd_cabang);
        }

        return $query;
    }

    public function getDetailData($id) 
    {
        $query = DB::table('pegawai')->where("Id_Pegawai", $id);

        return $query;
    }
}
