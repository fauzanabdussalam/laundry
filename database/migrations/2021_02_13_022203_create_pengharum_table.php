<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengharumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengharum', function (Blueprint $table) 
        {
            $table->string('Kd_Pengharum', 20);
            $table->string('Nama_Pengharum', 50);
            $table->primary('Kd_Pengharum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengharum');
    }
}
