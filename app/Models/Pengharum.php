<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengharum extends Model
{
    public $timestamps      = false;
    protected $table        = 'pengharum';
    protected $primaryKey   = 'Kd_Pengharum';

    protected $fillable = [
        'Kd_Pengharum', 'Nama_Pengharum'
    ];

    public function getListData() 
    {
        $query = DB::table('pengharum')->orderBy('Nama_Pengharum', 'asc');

        return $query;
    }

    public function getDetailData($kode) 
    {
        $query = DB::table('pengharum')->where("Kd_Pengharum", $kode);

        return $query;
    }
}
