<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angkets', function (Blueprint $table) {
            $table->id();
            $table->text('pertanyaan');
            $table->timestamps();
        });
    
        Schema::create('angket_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('angket_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('angket_response_id');
            $table->unsignedBigInteger('angket_id');
            $table->text('jawaban');
            $table->timestamps();
            
            $table->foreign('angket_response_id')->references('id')->on('angket_responses')->onDelete('cascade');
            $table->foreign('angket_id')->references('id')->on('angkets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('angkets');
        Schema::dropIfExists('angket_responses');
        Schema::dropIfExists('angkets');    
    }
}
