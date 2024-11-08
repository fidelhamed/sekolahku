<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoDaftarUlangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_daftar_ulang', function (Blueprint $table) {
            $table->id();
            $table->enum('jenjang', ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA'])->nullable();
            $table->date('tgl_buka')->nullable();
            $table->date('tgl_tutup')->nullable();
            $table->string('lokasi_laki_laki')->nullable();
            $table->string('lokasi_perempuan')->nullable();
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
        Schema::dropIfExists('info_daftar_ulang');
    }
}
