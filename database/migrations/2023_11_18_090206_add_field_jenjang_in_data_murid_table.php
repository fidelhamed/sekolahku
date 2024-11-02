<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldJenjangInDataMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_murids', function (Blueprint $table) {
            $table->enum('jenjang', ['TKTQ','TKTQ-2','SD-IT','SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA'])->after('nisn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_murids', function (Blueprint $table) {
            //
        });
    }
}
