<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $fillable = ['id_mitra', 'nama_paket', 'kode_paket', 'tarif', 'status'];
    
}
