<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Models\Cabang;
use App\Models\Layanan;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Pengharum;
use App\Models\Transaksi;

class AdminController extends Controller
{
    function swal($halaman, $proses)
    {
        $pesan = "Data $halaman berhasil $proses!";
        Session::flash('alert_swal','swal("Berhasil!", "'.$pesan.'", "success");');
    }

    function cabang()
    {   
        $classCabang = new Cabang();

        $cabang   = $classCabang->getListData()->get();

        return view('cabang', ['cabang' => $cabang]);
    }

    function getDataCabang(Request $request)
    {
        $classCabang = new Cabang();

        $data = $classCabang->getDetailData($request->kode)->first();

        return response()->json($data);
    }

    function saveCabang(Request $request)
    {
        $id     = array('Kd_Cabang' => $request->kode);
        $data   = array(
            'Kd_Cabang'             => $request->kode,
            'Nama_Cabang'           => $request->nama,
            'Nomor_Telepon_Cabang'  => $request->telp,
            'Alamat_Cabang'         => $request->alamat
        );

        Cabang::updateOrCreate($id, $data);        
        
        $proses = ($request->id == "")?"ditambahkan":"diubah";

        $this->swal("cabang", $proses);

        return redirect('cabang');
    }

    function hapusCabang(Request $request)
    {
        $classCabang = new Cabang();

        $data = $classCabang->getDetailData($request->kode)->delete();;

        return response()->json($data);
    }

    function layanan()
    {   
        $classLayanan = new Layanan();

        $layanan = $classLayanan->getListData()->get();

        return view('layanan', ['layanan' => $layanan]);
    }

    function getDataLayanan(Request $request)
    {
        $classLayanan = new Layanan();

        $data = $classLayanan->getDetailData($request->kode)->first();

        return response()->json($data);
    }

    function saveLayanan(Request $request)
    {
        $id     = array('Kd_Layanan' => $request->kode);
        $data   = array(
            'Kd_Layanan'    => $request->kode,
            'Nama_Layanan'  => $request->nama,
            'Tarif'         => $request->tarif
        );

        Layanan::updateOrCreate($id, $data);        
        
        $proses = ($request->id == "")?"ditambahkan":"diubah";

        $this->swal("layanan", $proses);

        return redirect('layanan');
    }

    function hapusLayanan(Request $request)
    {
        $classLayanan = new Layanan();

        $data = $classLayanan->getDetailData($request->kode)->delete();;

        return response()->json($data);
    }

    function pengharum()
    {   
        $classPengharum = new Pengharum();

        $pengharum = $classPengharum->getListData()->get();

        return view('pengharum', ['pengharum' => $pengharum]);
    }

    function getDataPengharum(Request $request)
    {
        $classPengharum = new Pengharum();

        $data = $classPengharum->getDetailData($request->kode)->first();

        return response()->json($data);
    }

    function savePengharum(Request $request)
    {
        $id     = array('Kd_Pengharum' => $request->kode);
        $data   = array(
            'Kd_Pengharum'    => $request->kode,
            'Nama_Pengharum'  => $request->nama
        );

        Pengharum::updateOrCreate($id, $data);        
        
        $proses = ($request->id == "")?"ditambahkan":"diubah";

        $this->swal("pengharum", $proses);

        return redirect('pengharum');
    }

    function hapusPengharum(Request $request)
    {
        $classPengharum = new Pengharum();

        $data = $classPengharum->getDetailData($request->kode)->delete();;

        return response()->json($data);
    }

    function pegawai()
    {   
        $classPegawai   = new Pegawai();
        $classCabang    = new Cabang();

        $pegawai    = $classPegawai->getListData()->get();
        $cabang     = $classCabang->getListData()->get();

        return view('pegawai', ['pegawai' => $pegawai, 'cabang' => $cabang]);
    }

    function getDataPegawai(Request $request)
    {
        $classPegawai = new Pegawai();

        $data = $classPegawai->getDetailData($request->id)->first();

        return response()->json($data);
    }

    function savePegawai(Request $request)
    {
        $id     = array('Id_Pegawai' => $request->id);
        $data   = array(
            'Nama_Pegawai'  => $request->nama,
            'Jenis_Kelamin' => $request->jk,
            'Kd_Cabang'     => $request->cabang
        );

        Pegawai::updateOrCreate($id, $data);        
        
        $proses = ($request->id == "")?"ditambahkan":"diubah";

        $this->swal("pegawai", $proses);

        return redirect('pegawai');
    }

    function hapusPegawai(Request $request)
    {
        $classPegawai = new Pegawai();

        $data = $classPegawai->getDetailData($request->id)->delete();;

        return response()->json($data);
    }

    function getListPegawaiByCabang(Request $request)
    {
        $classPegawai = new Pegawai();

        $data['pegawai']= $classPegawai->getListData($request->kd_cabang)->get();

        return response()->json($data);
    }

    function pelanggan()
    {
        $classPelanggan = new Pelanggan();

        $pelanggan = $classPelanggan->getListData()->get();
      
        return view('pelanggan', ['pelanggan' => $pelanggan]);
    }

    function getDataPelanggan(Request $request)
    {
        $classPelanggan = new Pelanggan();

        $is_telp = !empty($request->istelp)?$request->istelp:true;
        $data = $classPelanggan->getDetailData($request->id, $is_telp)->first();

        return response()->json($data);
    }

    function transaksi(Request $request)
    {
        $classTransaksi     = new Transaksi();
        $classCabang        = new Cabang();
        $classLayanan       = new Layanan();
        $classPengharum     = new Pengharum();

        $tgl_awal   = ($request->tgl_awal!='')?$request->tgl_awal:date('Y-m-d');
        $tgl_akhir  = ($request->tgl_akhir!='')?$request->tgl_akhir:date('Y-m-d');

        $transaksi      = $classTransaksi->getListData($tgl_awal, $tgl_akhir)->get();
        $cabang         = $classCabang->getListData()->get();
        $layanan        = $classLayanan->getListData()->get();
        $pengharum      = $classPengharum->getListData()->get();
      
        return view('transaksi', [
            'transaksi' => $transaksi,
            'cabang'    => $cabang,
            'layanan'   => $layanan,
            'pengharum' => $pengharum,
            'tgl_awal'  => $tgl_awal,
            'tgl_akhir' => $tgl_akhir
        ]);
    }

    function saveTransaksi(Request $request)
    {
        $classTransaksi = new Transaksi();
        $classPelanggan = new Pelanggan();

        $nomor_transaksi = $classTransaksi->generateNomorTransaksi();
        
        if(empty($request->id_pelanggan))
        {
            // INSERT PELANGGAN
            $id_pelanggan   = $classPelanggan->getNextId();
            $data_pelanggan = array(
                'Nama_Pelanggan'    => $request->nama,
                'No_HP_Pelanggan'   => $request->hp,
                'Alamat_Pelanggan'  => $request->alamat
            );
    
            Pelanggan::create($data_pelanggan); 
        }
        else
        {
            $id_pelanggan = $request->id_pelanggan;
        }

        $data = array(
            'Nomor_Transaksi'           => $nomor_transaksi,
            'Id_Pelanggan'              => $id_pelanggan,
            'Kd_Cabang'                 => $request->cabang,
            'Id_Pegawai'                => $request->pegawai,
            'Tanggal_Transaksi_Masuk'   => date('Y-m-d'),
            'Tanggal_Transaksi_Selesai' => $request->tanggal_selesai,
            'Kd_Layanan'                => $request->layanan,
            'Jumlah_Barang'             => $request->jumlah_barang,
            'Total_Bayar'               => $request->total_bayar,
            'Kd_Pengharum'              => $request->pengharum
        );

        Transaksi::create($data); 
        
        $this->swal("transaksi", "ditambahkan");

        return redirect('transaksi');
    }

    function transaksiDetail(Request $request)
    {
        $classTransaksi = new Transaksi();

        $data = $classTransaksi->getDetailData($request->nomor_transaksi)->first();

        return view('transaksi_detail', ['data' => $data]);
    }

    function hapusTransaksi(Request $request)
    {
        $classTransaksi = new Transaksi();

        $data = $classTransaksi->getDetailData($request->kode)->delete();;

        return response()->json($data);
    }
}
