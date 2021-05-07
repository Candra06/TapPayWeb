<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';
    protected $fillable = ['collector', 'payer', 'jumlah_tagihan', 'tagihan_bulan','status_tagihan', 'bukti', 'created_by', 'updated_by'];
}
