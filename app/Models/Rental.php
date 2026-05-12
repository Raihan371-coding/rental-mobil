<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'id_rental',
        'id_customer',
        'id_mobil',
        'tanggal_rental',
        'tanggal_kembali',
        'total_harga',
        'status',
    ];
}
