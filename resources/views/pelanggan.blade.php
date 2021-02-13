@extends('layout')

@section('content')
  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="fa fa-user"></i> Pelanggan</h4>
                </div>
            </div>

            <div class="panel">          
                <div class="panel-body">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            @foreach($pelanggan as $data)
                            <tr class="gradeX">
                                <td>{{ $data->Nama_Pelanggan }}</td>
                                <td>{{ $data->No_HP_Pelanggan }}</td>
                                <td>{{ $data->Alamat_Pelanggan }}</td>
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
@endsection