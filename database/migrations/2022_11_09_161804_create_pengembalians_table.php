<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id('idKembali');
            $table->integer('idPinjam');
            $table->date('TanggalKembali');
            $table->time('WaktuPengembalian', $precision = 0);
            $table->integer('JumlahBarang');
            $table->enum('StatusBarang', ['Kembali', 'Tidak Kembali'])->nullable();
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
        Schema::dropIfExists('pengembalians');
    }
}
