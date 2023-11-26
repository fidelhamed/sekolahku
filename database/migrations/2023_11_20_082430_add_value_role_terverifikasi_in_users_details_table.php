<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValueRoleTerverifikasiInUsersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_details', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `users_details` CHANGE `role` `role` ENUM('Admin','Murid','Guest','PPDB','Terverifikasi')");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_details', function (Blueprint $table) {
            //
        });
    }
}
