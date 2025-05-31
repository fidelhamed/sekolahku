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
            $table->string('noreg', 25)->nullable()->unique();
            $table->string('nik', 16)->nullable()->unique();
            $table->bigInteger('nisn')->nullable()->unique();
            $table->enum('jalur', ['Reguler', 'Prestasi', 'Internal'])->nullable();
            $table->string('nama_panggilan', 25)->nullable();
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kelurahan', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kabupaten', 50)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->string('kode_pos', 5)->nullable();
            $table->string('telp', 20)->nullable();
            $table->string('whatsapp', 20)->nullable();
            $table->string('nama_sekolah_asal', 50)->nullable();
            $table->string('npsn_sekolah_asal', 50)->nullable();
            $table->string('kecamatan_sekolah_asal', 50)->nullable();
            $table->string('kabupaten_sekolah_asal', 50)->nullable();
            $table->integer('lingkar_kepala')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('gol_darah', 5)->nullable();
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
