<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('Nomor_Transaksi', 20);
            $table->string('Kd_Cabang', 20);
            $table->unsignedBigInteger('Id_Pelanggan');
            $table->string('Kd_Layanan', 20);
            $table->float('Jumlah_Barang');
            $table->double('Total_Bayar');
            $table->string('Kd_Pengharum', 20);
            $table->date('Tanggal_Transaksi_Masuk');
            $table->date('Tanggal_Transaksi_Selesai');
            $table->unsignedBigInteger('Id_Pegawai');
            $table->primary('Nomor_Transaksi');
            $table->foreign('Kd_Cabang')->references('Kd_Cabang')->on('cabang')->onDelete('cascade');
            $table->foreign('Id_Pelanggan')->references('Id_Pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('Kd_Layanan')->references('Kd_Layanan')->on('layanan')->onDelete('cascade');
            $table->foreign('Kd_Pengharum')->references('Kd_Pengharum')->on('pengharum')->onDelete('cascade');
            $table->foreign('Id_Pegawai')->references('Id_Pegawai')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
