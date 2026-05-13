<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = [
    'kode_promo',
    'potongan',
    'tanggal_mulai',
    'tanggal_selesai'
];
}
