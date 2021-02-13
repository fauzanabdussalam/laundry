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
                                <button class="btn btn-primary" onclick="tambah()">Tambah <i class="fa fa-plus"></i></button>
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
                                <th>Layanan</th>
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
                                <td>{{ $data->Nama_Layanan }}</td>
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

<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Transaksi</h4> 
            </div> 
            
            <form action="{{ Route('transaksi.save') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">No. HP Pelanggan</label>
                                <input type="text" class="form-control" id="hp" name="hp" onblur="checkDataPelanggan(this.value)" required> 
                                <input type="hidden" id="id_pelanggan" name="id_pelanggan"> 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Nama Pelanggan</label> 
                                <input type="text" class="form-control" id="nama" name="nama" required> 
                            </div> 
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-7" class="control-label">Alamat</label> 
                                <textarea class="form-control autogrow" id="alamat" name="alamat" rows="3" required></textarea>
                            </div> 
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Cabang</label>
                                <select  class="form-control" id="cabang" name="cabang" onchange="getPegawai(this.value);" required>
                                    <option value="">--Pilih Cabang--</option>
                                    @foreach($cabang as $data)
                                        <option value="{{ $data->Kd_Cabang }}">{{ $data->Nama_Cabang }}</option>
                                    @endforeach
                                </select> 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Pegawai</label>
                                <select  class="form-control" id="pegawai" name="pegawai" required>
                                    <option value="">--Pilih Pegawai--</option>
                                </select> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ date("Y-m-d") }}" disabled> 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Tanggal Selesai</label> 
                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                            </div> 
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Layanan</label>
                                <select  class="form-control" id="layanan" name="layanan" onchange="getTarif(this.value);" required>
                                    <option value="">--Pilih Layanan--</option>
                                    @foreach($layanan as $data)
                                        <option value="{{ $data->Kd_Layanan }}">{{ $data->Nama_Layanan }}</option>
                                    @endforeach
                                </select> 
                            </div> 
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Tarif</label> 
                                <input type="number" class="form-control" id="tarif" name="tarif" value="0" disabled>
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Jumlah Barang (Kg)</label>
                                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="1" step=".001" onchange="hitungTotal();" required>
                            </div> 
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Total Bayar</label> 
                                <input type="number" class="form-control" id="total" name="total" value="0" disabled>
                                <input type="hidden" id="total_bayar" name="total_bayar" value="0">
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Pengharum</label>
                                <select  class="form-control" id="pengharum" name="pengharum" required>
                                    <option value="">--Pilih Pengharum--</option>
                                    @foreach($pengharum as $data)
                                        <option value="{{ $data->Kd_Pengharum }}">{{ $data->Nama_Pengharum }}</option>
                                    @endforeach
                                </select> 
                            </div> 
                        </div> 
                    </div> 
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button> 
                    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">Simpan <i class="fa fa-save"></i></button> 
                </div> 
            </form>
        </div> 
    </div>
</div><!-- /.modal -->

  <script>
    function tambah()
    {
        $('#edit').modal('show');
        setMinTgl();
    }

    function checkDataPelanggan(telp)
    {
        $.ajax(
        {
            url:"{{ Route('pelanggan.data') }}",
            type: "POST",
            data: {
                id: telp,
                istelp: true,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(value)
            {
                $("#id_pelanggan").val(value.Id_Pelanggan);
                $("#nama").val(value.Nama_Pelanggan);
                $("#alamat").val(value.Alamat_Pelanggan);
            }
        });
    }

    function getPegawai(kd_cabang, id_pegawai = '')
    {
        $("#pegawai").html('');
        $.ajax(
        {
            url:"{{ Route('pegawai.list') }}",
            type: "POST",
            data: {
                kd_cabang: kd_cabang,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result)
            {
                $("#pegawai").append('<option value="">--Pilih Pegawai--</option>');
                $.each(result.pegawai,function(key,value)
                {
                    selected = (id_pegawai != "" && id_pegawai == value.id)?"selected":"";

                    $("#pegawai").append('<option value="'+value.Id_Pegawai+'" '+selected+'>'+value.Nama_Pegawai+'</option>');
                });
            }
        });
    }

    function setMinTgl()
    {
        var dtToday = new Date();
    
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;

        $('#tanggal_selesai').attr('min', maxDate);
        $('#tanggal_selesai').val(maxDate);
    }

    function getTarif(kd_layanan)
    {
        if(kd_layanan != "")
        {
            $.ajax(
            {
                url:"{{ Route('layanan.data') }}",
                type: "POST",
                data: {
                    kode: kd_layanan,
                    _token: '{{csrf_token()}}'
                },
                dataType : 'json',
                success: function(value)
                {
                    $('#tarif').val(value.Tarif);
                    hitungTotal();
                }
            });
        }
        else
        {
            $('#tarif').val('0');
            hitungTotal();
        }
    }

    function hitungTotal()
    {
        total = $('#tarif').val() * $('#jumlah_barang').val();
        $('#total').val(total);
        $('#total_bayar').val(total);
    }

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