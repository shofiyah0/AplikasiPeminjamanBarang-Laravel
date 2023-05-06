<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id('idPinjam');
            $table->string('NamaPeminjam');
            $table->bigInteger('NomorInduk');
            $table->date('TanggalPinjam');
            $table->time('WaktuPeminjaman', $precision = 0);
            $table->string('LokasiPinjam');
            $table->integer('KodeBarang');
            $table->integer('JumlahBarang');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjams');
    }
}
