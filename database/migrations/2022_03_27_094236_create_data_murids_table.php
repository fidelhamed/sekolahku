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
            $table->bigInteger('user_id')->unique();
            $table->string('noreg')->nullable()->unique();
            $table->string('nik')->nullable()->unique();
            // $table->bigInteger('nis')->nullable();
            $table->bigInteger('nisn')->nullable()->unique();
            $table->enum('jalur',['Reguler','Prestasi','Internal'])->nullable();
            $table->string('nama_panggilan')->nullable();
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('jumlah_saudara')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('telp')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('nama_sekolah_asal')->nullable();
            $table->string('npsn_sekolah_asal')->nullable();
            $table->string('kecamatan_sekolah_asal')->nullable();
            $table->string('kabupaten_sekolah_asal')->nullable();
            $table->integer('lingkar_kepala')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('gol_darah')->nullable();
            $table->text('sakit')->nullable();
            $table->text('prestasi')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();

            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');
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
