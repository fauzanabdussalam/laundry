@extends('layout')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="fa fa-cart-plus"></i> Transaksi</h4>
                </div>
            </div>

            <div class="panel panel-default">          
                <div class="panel-heading">
                    <h3 class="panel-title">Detail</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form">        
                        <div class="col-sm-6">                                    
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nomor Transaksi : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ $data->Nomor_Transaksi }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nama Pelanggan : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ $data->Nama_Pelanggan }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">No. HP Pelanggan : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ $data->No_HP_Pelanggan }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Alamat Pelanggan : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ $data->Alamat_Pelanggan }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Cabang : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ $data->Nama_Cabang }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tanggal Transaksi Masuk : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ date("d F Y", strtotime($data->Tanggal_Transaksi_Masuk)) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tanggal Transaksi Selesai : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ date("d F Y", strtotime($data->Tanggal_Transaksi_Selesai)) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">    
                            <div class="form-group">
                                <label class="col-md-4 control-label">Layanan : </label>
                                <div class="col-md-8 form-control-static">
                                    {{$data->Nama_Layanan }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tarif : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ "Rp " . number_format($data->Tarif, 0, ",", ".") }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Jumlah Barang : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ str_replace(".", ",", $data->Jumlah_Barang) }} kg
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Total Bayar : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ "Rp " . number_format($data->Total_Bayar, 0, ",", ".") }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Pengharum : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ $data->Nama_Pengharum }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Pegawai : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ $data->Nama_Pegawai }}
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end Panel -->
            </div>
        </div>
    </div> 
</div>  
@endsection