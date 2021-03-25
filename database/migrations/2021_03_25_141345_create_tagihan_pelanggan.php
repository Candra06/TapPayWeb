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
        Schema::create('tagihan_pelanggan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_mitra');
            $table->unsignedInteger('id_pelanggan');
            $table->unsignedInteger('id_paket');
            $table->integer('jumlah_tagihan');
            $table->date('tagihan_bulan');
            $table->enum('status_tagihan', ['Masuk', 'Lunas']);
            $table->timestamps();
            $table->foreign('id_mitra')->references('id')->on('mitra');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
            $table->foreign('id_paket')->references('id')->on('paket');
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
