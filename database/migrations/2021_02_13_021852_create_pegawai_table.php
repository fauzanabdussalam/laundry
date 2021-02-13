<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) 
        {
            $table->id('Id_Pegawai');
            $table->string('Nama_Pegawai', 50);
            $table->string('Jenis_Kelamin', 20);
            $table->string('Kd_Cabang', 20);
            $table->foreign('Kd_Cabang')->references('Kd_Cabang')->on('cabang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
