<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = 'mitra';
    protected $fillable = ['id_akun', 'nama_usaha', 'alamat', 'telepon', 'info'];
}
