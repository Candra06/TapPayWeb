<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerlangganan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berlangganan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mitra')->unsigned();
            $table->integer('id_pelanggan')->nullable();
            $table->integer('id_paket');
            $table->string('kode_undangan', 8);
            $table->enum('status', ['Aktif', 'Nonaktif']);
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
        Schema::dropIfExists('berlangganan');
    }
}
