<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataOrangTuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_orang_tuas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('nama_ayah', 100)->nullable();
            $table->string('nik_ayah', 16)->nullable();
            $table->enum('pendidikan_ayah',['SD','SMP','SMA/SMK','S1','S2','S3'])->nullable();
            $table->enum('pekerjaan_ayah',['Pegawai Negeri', 'Pegawai Swasta', 'Wiraswasta', 'TNI/Polri', 'Petani/Nelayan', 'Buruh', 'Lainnya'])->nullable();
            $table->string('instansi_ayah')->nullable();
            $table->enum('penghasilan_ayah', ['0-1', '2-5', '6-10', '>10'])->nullable();
            $table->string('alamat_ayah', 100)->nullable();
            $table->string('telp_ayah', 20)->nullable();
            
            $table->string('nama_ibu', 100)->nullable();
            $table->string('nik_ibu', 16)->nullable();
            $table->enum('pendidikan_ibu',['SD','SMP','SMA/SMK','S1','S2','S3'])->nullable();
            $table->enum('pekerjaan_ibu',['Ibu Rumah Tangga', 'Pegawai Negeri', 'Pegawai Swasta', 'Wiraswasta', 'TNI/Polri', 'Petani/Nelayan', 'Buruh', 'Lainnya'])->nullable();
            $table->string('instansi_ibu')->nullable();
            $table->enum('penghasilan_ibu', ['0-1', '2-5', '6-10', '>10'])->nullable();
            $table->string('alamat_ibu', 100)->nullable();
            $table->string('telp_ibu', 20)->nullable();
            
            $table->string('nama_wali')->nullable();
            $table->string('telp_wali')->nullable();
            $table->text('alamat_wali')->nullable();
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
        Schema::dropIfExists('data_orang_tuas');
    }
}
