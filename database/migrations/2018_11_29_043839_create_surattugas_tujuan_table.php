<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurattugasTujuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surattugas_tujuan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('surattugas_id')->unsigned();
            $table->foreign('surattugas_id')->references('id')->on('surattugas')->onDelete('CASCADE');
            $table->integer('tujuan_id')->unsigned();
            $table->foreign('tujuan_id')->references('id')->on('tujuans')->onDelete('CASCADE');
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
        Schema::dropIfExists('surattugas_tujuan');
    }
}
