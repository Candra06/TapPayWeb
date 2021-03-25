<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tagihan');
            $table->integer('jumlah_tagihan');
            $table->string('bukti_pembayaran', 20);
            $table->enum('status_pembayaran', ['Pending', 'Ditolak', 'Diterima']);
            $table->text('keterangan');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
            $table->foreign('id_tagihan')->references('id')->on('tagihan_mitra');
            $table->foreign('id_tagihan')->references('id')->on('tagihan_pelanggan');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
