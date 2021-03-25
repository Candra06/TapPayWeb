<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_akun');
            $table->string('nama', 40);
            $table->text('alamat');
            $table->string('telepon', 13);
            $table->enum('status', ['Aktif', 'Banned', 'Suspend']);
            $table->foreign('id_akun')->references('id')->on('users');
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
        Schema::dropIfExists('pelanggan');
    }
}
