<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berlangganan extends Model
{
    protected $table = 'berlangganan';
    protected $fillable = ['id_mitra', 'id_pelanggan', 'id_paket', 'kode_undangan', 'status'];
}
