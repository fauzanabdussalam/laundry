<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Layanan extends Model
{
    public $timestamps      = false;
    protected $table        = 'layanan';
    protected $primaryKey   = 'Kd_Layanan';

    protected $fillable = [
        'Kd_Layanan', 'Nama_Layanan', 'Tarif'
    ];

    public function getListData() 
    {
        $query = DB::table('layanan')->orderBy('Nama_Layanan', 'asc');

        return $query;
    }

    public function getDetailData($kode) 
    {
        $query = DB::table('layanan')->where("Kd_Layanan", $kode);

        return $query;
    }
}
