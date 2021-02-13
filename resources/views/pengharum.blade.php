@extends('layout')

@section('content')
  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="md md-battery-std"></i> Pengharum</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Admin</a></li>
                        <li class="active">Pengharum</li>
                    </ol>
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
                                <th>Kode Pengharum</th>
                                <th>Nama Pengharum</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            @foreach($pengharum as $data)
                            <tr class="gradeX">
                                <td>{{ $data->Kd_Pengharum }}</td>
                                <td>{{ $data->Nama_Pengharum }}</td>
                                <td class="actions">
                                    <button class="btn btn-icon btn-sm btn-success" onclick="edit('{{ $data->Kd_Pengharum }}')"> <i class="fa fa-edit"></i> </button> 
                                    <button class="btn btn-icon btn-sm btn-danger" onclick="hapus('{{ $data->Kd_Pengharum }}')"> <i class="fa fa-trash"></i> </button>
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
                <h4 class="modal-title">Pengharum</h4> 
            </div> 
            
            <form action="{{ Route('pengharum.save') }}" method="post" onsubmit="return checkDuplicateCode();"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" id="kode_old" name="kode_old"> 
                           
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Kode Pengharum</label> 
                                <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Pengharum" required> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Nama Pengharum</label> 
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pengharum" required> 
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
            url:"{{ Route('pengharum.data') }}",
            type: "POST",
            data: {
                kode: kode,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(value)
            {   
                $("#kode_old").val(value.Kd_Pengharum);
                $("#kode").val(value.Kd_Pengharum);
                $("#nama").val(value.Nama_Pengharum);
            }
        });
    }

    function resetValue()
    {
        $("#kode_old").val("");
        $("#kode").val("");
        $("#nama").val("");
    }

    function hapus(kode)
    {
        if(!confirm("Apakah anda yakin?")) 
        {
            return false;
        }

        $.ajax(
        {
            url: "{{ Route('pengharum.delete') }}",
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
            url:"{{ Route('pengharum.data') }}",
            type: "POST",
            data: {
                kode: $("#kode").val(),
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            async : false,
            success: function(value)
            {
                if(value.Kd_Pengharum && value.Kd_Pengharum != $("#kode_old").val())
                {
                    alert("Kode Pengharum Sudah Terpakai!");
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