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

            <div class="panel">          
                <div class="panel-body"> 
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="m-b-30">
                                <a href="{{ Route('transaksi.input') }}" class="btn btn-primary">Tambah <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ Route('transaksi') }}" class="form-inline" role="form" style="float: right;">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="{{ $tgl_awal }}">
                                </div>
                                
                                <div class="form-group m-l-10">
                                    <label>Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="{{ $tgl_akhir }}">
                                </div>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light m-l-10"><i class="fa fa-search"> Cari</i></button>
                            </form>
                        </div>
                    </div>

                    <hr>
                    
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Nomor <br> Transaksi</th>
                                <th>Nama <br> Pelanggan</th>
                                <th>Telp <br> Pelanggan</th>
                                <th>Cabang</th>
                                <th>Tanggal Transaksi <br> Masuk</th>
                                <th>Tanggal Transaksi <br> Selesai</th>
                                <th>Total Bayar</th>
                                <th>Pegawai</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            @foreach($transaksi as $data)
                            <tr class="gradeX">
                                <td>{{ $data->Nomor_Transaksi }}</td>
                                <td>{{ $data->Nama_Pelanggan }}</td>
                                <td>{{ $data->No_HP_Pelanggan }}</td>
                                <td>{{ $data->Nama_Cabang }}</td>
                                <td>{{ date('d-m-Y', strtotime($data->Tanggal_Transaksi_Masuk)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($data->Tanggal_Transaksi_Selesai)) }}</td>
                                <td>{{ $data->Total_Bayar }}</td>
                                <td>{{ $data->Nama_Pegawai }}</td>
                                <td>
                                    <button class="btn btn-icon btn-sm btn-info" onclick="detail('{{ $data->Nomor_Transaksi }}')"><i class="fa fa-eye"></i></button>           
                                    <button class="btn btn-icon btn-sm btn-danger" onclick="hapus('{{ $data->Nomor_Transaksi }}')"> <i class="fa fa-trash"></i> </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end: page -->
            </div> <!-- end Panel -->
        </div>
    </div>
  </div> 

  <script>
    function detail(id)
    {
        var formdetail    = document.createElement("form");
        formdetail.method = "post";
        formdetail.action = "{{ Route('transaksi.detail') }}";

        var _token   = document.createElement("input");
        _token.type  = "hidden";
        _token.name  = "_token";
        _token.value = "{{csrf_token()}}";

        var _id   = document.createElement("input");
        _id.type  = "hidden";
        _id.name  = "nomor_transaksi";
        _id.value = id;

        formdetail.appendChild(_token);
        formdetail.appendChild(_id);

        document.body.appendChild(formdetail);
        formdetail.submit();
    }

    function hapus(kode)
    {
        if(!confirm("Apakah anda yakin?")) 
        {
            return false;
        }

        $.ajax(
        {
            url: "{{ Route('transaksi.delete') }}",
            type: 'POST',
            data: 
            {
                kode: kode,
                _token: '{{csrf_token()}}'
            },
            success: function (response)
            {
                swal({
                    title: "Berhasil!",
                    text: "Data berhasil dihapus!",
                    type: "success"
                }, function() {
                    location.reload();
                });
            }
        });
        
        return false;
    }
</script>
@endsection