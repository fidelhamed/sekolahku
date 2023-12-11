<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodeRegistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periode_registrasi', function (Blueprint $table) {
            $table->id();
            $table->enum('jenjang', ['SMP-IT', 'SMA-IT', 'MA'])->nullable();
            $table->date('tgl_buka')->nullable();
            $table->date('tgl_tutup')->nullable();
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
        Schema::dropIfExists('periode_registrasi');
    }
}
