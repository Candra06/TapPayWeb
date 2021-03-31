<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = ['id_akun', 'nama', 'alamat', 'telepon'];
}
