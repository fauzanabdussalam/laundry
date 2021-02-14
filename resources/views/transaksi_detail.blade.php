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
                            <div class="form-group">
                                <label class="col-md-4 control-label">Cabang : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ $data->Nama_Cabang }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Pegawai : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ $data->Nama_Pegawai }}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">    
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
                                <label class="col-md-4 control-label">Pengharum : </label>
                                <div class="col-md-8 form-control-static">
                                    {{ $data->Nama_Pengharum }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td width="30%">Layanan</td>
                                        <td width="25%">Tarif</td>
                                        <td width="20%">Jumlah Barang (kg)</td>
                                        <td width="25%">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(json_decode($data->List_Layanan) as $key => $value)
                                        <tr>
                                            <td>{{ $value->nama_layanan }}</td>
                                            <td align="right">{{ "Rp " . number_format($value->tarif, 0, ",", ".") }}</td>
                                            <td align="center">{{ str_replace(".", ",", $value->jumlah_barang) }}</td>
                                            <td align="right">{{ "Rp " . number_format($value->total, 0, ",", ".") }}</td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">Total Bayar</td>
                                        <td align="right">{{ "Rp " . number_format($data->Total_Bayar, 0, ",", ".") }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div> <!-- end Panel -->
            </div>
        </div>
    </div> 
</div>  
@endsection