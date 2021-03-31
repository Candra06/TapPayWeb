<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihanPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('collector');
            $table->unsignedInteger('payer');
            $table->integer('jumlah_tagihan');
            $table->date('tagihan_bulan');
            $table->enum('status_tagihan', ['Masuk', 'Lunas']);
            $table->timestamps();
            $table->foreign('collector')->references('id')->on('users');
            $table->foreign('payer')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihan_pelanggan');
    }
}
