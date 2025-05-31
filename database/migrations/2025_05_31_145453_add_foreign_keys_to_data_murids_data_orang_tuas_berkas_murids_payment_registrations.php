<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDataMuridsDataOrangTuasBerkasMuridsPaymentRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tambahkan foreign key pada data_murids
        Schema::table('data_murids', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change(); // pastikan tipe cocok
            $table->foreign('user_id', 'fk_data_murids_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        // Tambahkan foreign key pada data_orang_tuas
        Schema::table('data_orang_tuas', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->foreign('user_id', 'fk_data_orang_tuas_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        // Tambahkan foreign key pada berkas_murids
        Schema::table('berkas_murids', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->foreign('user_id', 'fk_berkas_murids_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        // Tambahkan foreign key pada payment_registrations
        Schema::table('payment_registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->foreign('user_id', 'fk_payment_registrations_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        // Hapus foreign key dari data_murids
        Schema::table('data_murids', function (Blueprint $table) {
            $table->dropForeign('fk_data_murids_user_id');
        });

        // Hapus foreign key dari data_orang_tuas
        Schema::table('data_orang_tuas', function (Blueprint $table) {
            $table->dropForeign('fk_data_orang_tuas_user_id');
        });

        // Hapus foreign key dari berkas_murids
        Schema::table('berkas_murids', function (Blueprint $table) {
            $table->dropForeign('fk_berkas_murids_user_id');
        });

        // Hapus foreign key dari payment_registrations
        Schema::table('payment_registrations', function (Blueprint $table) {
            $table->dropForeign('fk_berkas_payment_registrations_id');
        });

    }
}
