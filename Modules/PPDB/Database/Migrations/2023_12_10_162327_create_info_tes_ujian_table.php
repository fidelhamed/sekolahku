<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTesUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_tes_ujian', function (Blueprint $table) {
            $table->id();
            $table->enum('jenjang', ['SD-IT', 'SMP-IT', 'SMA-IT', 'MA'])->nullable();
            $table->date('waktu_tgl')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_berakhir')->nullable();
            $table->string('lokasi')->nullable();
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('info_tes_ujian');
    }
}
