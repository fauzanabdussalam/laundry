<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabang', function (Blueprint $table) 
        {
            $table->string('Kd_Cabang', 20);
            $table->string('Nama_Cabang', 50);
            $table->string('Nomor_Telepon_Cabang', 15);
            $table->text('Alamat_Cabang');
            $table->primary('Kd_Cabang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cabang');
    }
}
