<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_mitra');
            $table->string('nama_paket', 30);
            $table->string('kode_paket', 10);
            $table->integer('tarif');
            $table->enum('status', ['Aktif', 'Banned']);
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
        Schema::dropIfExists('paket');
    }
}
