<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'id_pembayaran',
        'id_rental',
        'tanggal_bayar',
        'metode_bayar',
        'jumlah_bayar',
        'status_bayar',
    ];
}
