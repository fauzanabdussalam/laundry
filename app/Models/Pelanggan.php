<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    public $timestamps      = false;
    protected $table        = 'pelanggan';
    protected $primaryKey   = 'Id_Pelanggan';

    protected $fillable = [
        'Nama_Pelanggan', 'No_HP_Pelanggan', 'Alamat_Pelanggan'
    ];

    public function getNextId() 
    {
        $statement = DB::select("show table status like 'pelanggan'");

        return $statement[0]->Auto_increment;
    }

    public function getListData() 
    {
        $query = DB::table('pelanggan')->orderBy('Nama_Pelanggan', 'asc');

        return $query;
    }

    public function getDetailData($id, $is_telp = false) 
    {
        $query = DB::table('pelanggan');

        if(!$is_telp)
        {
            $query = $query->where("Id_Pelanggan", $id);
        }
        else
        {     
            $query = $query->where("No_HP_Pelanggan", $id);
        }
        return $query;
    }
}
