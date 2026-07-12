<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $fillable = [
        'id_rental',
        'tanggal_pengembalian',
        'kondisi_mobil',
        'denda',
        'keterangan',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class, 'id_rental');
    }
}
