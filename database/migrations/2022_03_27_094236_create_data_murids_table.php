<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_murids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('noreg')->nullable();
            $table->bigInteger('nis')->nullable();
            $table->bigInteger('nisn')->nullable();
            $table->string('nama_panggilan')->nullable();
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('anak_ke')->nullable();
            $table->text('alamat')->nullable();
            $table->text('sakit')->nullable();
            $table->string('telp')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->text('alamat_sekolah')->nullable();
            $table->text('prestasi')->nullable();
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
        Schema::dropIfExists('data_murids');
    }
}
