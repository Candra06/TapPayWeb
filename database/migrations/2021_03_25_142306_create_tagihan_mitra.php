<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihanMitra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan_mitra', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_mitra');
            $table->integer('jumlah_tagihan');
            $table->date('tagihan_bulan');
            $table->enum('status_tagihan', ['Masuk', 'Lunas']);
            $table->timestamps();
            $table->foreign('id_mitra')->references('id')->on('mitra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihan_mitra');
    }
}
