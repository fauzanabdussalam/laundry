@extends('layout')

@section('content')
  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="md md-home"></i> Cabang</h4>
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
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Kode Cabang</th>
                                <th>Nama Cabang</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            @foreach($cabang as $data)
                            <tr class="gradeX">
                                <td>{{ $data->Kd_Cabang }}</td>
                                <td>{{ $data->Nama_Cabang }}</td>
                                <td>{{ $data->Nomor_Telepon_Cabang }}</td>
                                <td>{{ $data->Alamat_Cabang }}</td>
                                <td class="actions">
                                    <button class="btn btn-icon btn-sm btn-success" onclick="edit('{{ $data->Kd_Cabang }}')"> <i class="fa fa-edit"></i> </button> 
                                    <button class="btn btn-icon btn-sm btn-danger" onclick="hapus('{{ $data->Kd_Cabang }}')"> <i class="fa fa-trash"></i> </button>
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
                <h4 class="modal-title">Cabang</h4> 
            </div> 
            
            <form action="{{ Route('cabang.save') }}" method="post" onsubmit="return checkDuplicateCode();" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" id="kode_old" name="kode_old"> 
                           
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Kode Cabang</label> 
                                <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Cabang" required> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Nama Cabang</label> 
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Cabang" required> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">No. Telp</label> 
                                <input type="text" class="form-control" id="telp" name="telp" placeholder="No. Telp Cabang" required> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-7" class="control-label">Alamat</label> 
                                <textarea class="form-control autogrow" id="alamat" name="alamat" placeholder="Alamat Cabang" rows="4" required></textarea>
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
        resetValue();
    }

    function edit(kode)
    {
        $('#edit').modal('show');

        $.ajax(
        {
            url:"{{ Route('cabang.data') }}",
            type: "POST",
            data: {
                kode: kode,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(value)
            {   
                $("#kode_old").val(value.Kd_Cabang);
                $("#kode").val(value.Kd_Cabang);
                $("#nama").val(value.Nama_Cabang);
                $("#telp").val(value.Nomor_Telepon_Cabang);
                $("#alamat").val(value.Alamat_Cabang);
            }
        });
    }

    function resetValue()
    {
        $("#kode_old").val("");
        $("#kode").val("");
        $("#nama").val("");
        $("#telp").val("");
        $("#alamat").val("");
    }

    function hapus(kode)
    {
        if(!confirm("Apakah anda yakin?")) 
        {
            return false;
        }

        $.ajax(
        {
            url: "{{ Route('cabang.delete') }}",
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

    function checkDuplicateCode()
    {
        ret = false;
        
        $.ajax(
        {
            url:"{{ Route('cabang.data') }}",
            type: "POST",
            data: {
                kode: $("#kode").val(),
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            async : false,
            success: function(value)
            {
                if(value.Kd_Cabang && value.Kd_Cabang != $("#kode_old").val())
                {
                    alert("Kode Cabang Sudah Terpakai!");
                }
                else
                {
                    ret = true;
                }
            }
        });

        return ret;
    }
</script>
@endsection