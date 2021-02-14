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
            
            <form action="{{ Route('transaksi.save') }}" method="post" onsubmit="return checkLayananTerisi();" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="panel panel-default">          
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Transaksi</h3>
                    </div>
                    <div class="panel-body">
                        <div style="float: left;width: 45%;">
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label class="control-label">Tanggal Masuk</label>
                                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ date("Y-m-d") }}" disabled> 
                                    </div> 
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label for="field-5" class="control-label">Tanggal Selesai</label> 
                                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                                    </div> 
                                </div> 
                            </div>
                            <div class="row"> 
                                <div class="col-md-12"> 
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
                            </div>
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label class="control-label">Pegawai</label>
                                        <select  class="form-control" id="pegawai" name="pegawai" required>
                                            <option value="">--Pilih Pegawai--</option>
                                        </select> 
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

                        <div style="float: right;width: 45%;">
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label class="control-label">No. HP Pelanggan</label>
                                        <input type="text" class="form-control" id="hp" name="hp" onblur="checkDataPelanggan(this.value)" required> 
                                        <input type="hidden" id="id_pelanggan" name="id_pelanggan"> 
                                    </div> 
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-12"> 
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
                        </div> 
                        <input type="hidden" id="is_layanan_terisi" name="is_layanan_terisi" value="0">
                        <div class="row"> 
                            <div class="col-md-12">
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td width="30%">Layanan</td>
                                            <td width="20%">Tarif</td>
                                            <td width="20%">Jumlah Barang (kg)</td>
                                            <td width="20%">Total</td>
                                            <td width="10%"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select  class="form-control" id="layanan" name="layanan" onchange="getTarif(this.value);">
                                                    <option value="">--Pilih Layanan--</option>
                                                    @foreach($layanan as $data)
                                                        <option value="{{ $data->Kd_Layanan }}">{{ $data->Nama_Layanan }}</option>
                                                    @endforeach
                                                </select> 
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="tarif" name="tarif" value="0" disabled>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="1" step=".001" onchange="hitungTotal();">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="total" name="total" value="0" disabled>
                                            </td>
                                            <td align="center">
                                                <button type="button" class="btn btn-icon btn-sm btn-primary" onclick="addCart()"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody id="list_layanan">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">Total Bayar</td>
                                            <td align="right"><span id="total_bayar"></span></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end Panel -->
                    <div class="panel-footer" style="text-align: center"> 
                        <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">Simpan <i class="fa fa-save"></i></button> 
                    </div> 
                </div>
            </form>
        </div>
    </div> 
</div>  

<script type="text/javascript">
    window.onload = function() 
    {
        setMinTgl();
        clearCart();
    };

    function clearCart()
    {
        $.ajax(
        {
            url:"{{ Route('cart.clear') }}",
            type: "POST",
            data: 
            {
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result)
            {
            }
        });
    }

    function getListCart()
    {
        $.ajax(
        {
            url:"{{ Route('cart') }}",
            type: "POST",
            data: 
            {
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result)
            {
                $("#list_layanan").text('');
                $.each(result.cart,function(key,value)
                {
                    row =   '<tr>' +
                                '<td>'+value.name+'</td>' +
                                '<td align="right">' + value.quantity + '</td>' +
                                '<td align="center">' + value.price + '</td>' +
                                '<td align="right">' + value.total + '</td>' +
                                '<td align="center"><button type="button" class="btn btn-icon btn-sm btn-danger" onclick="removeCart(\'' + value.id + '\')"><i class="fa fa-remove"></i></button></td>' +
                            '</tr>';

                    $("#list_layanan").append(row);
                    $('#is_layanan_terisi').val('1')
                });

                $("#total_bayar").text(result.total);

                var scroll_value = document.getElementById('div_that_loaded').offsetHeight();
                window.scrollBy(0,scroll_value);
            }
        });
    }

    function addCart()
    {
        $.ajax(
        {
            url:"{{ Route('cart.add') }}",
            type: "POST",
            data: 
            {
                id: $("#layanan").val(),
                price: $("#jumlah_barang").val(),
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result)
            {
                $("#layanan").val('');
                $("#tarif").val('0');
                $("#jumlah_barang").val('1');
                $("#total").val('0');
                getListCart();
            }
        });
    }

    function removeCart(id)
    {
        $.ajax(
        {
            url:"{{ Route('cart.remove') }}",
            type: "POST",
            data: 
            {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result)
            {
                getListCart();
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
        $('#totalshow').val(total);
    }

    function checkLayananTerisi()
    {
        if($('#is_layanan_terisi').val() == '0')
        {
            alert('Layanan Belum Diisi!');
            return false;
        }
    }
</script>
@endsection