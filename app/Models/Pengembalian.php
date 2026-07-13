<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasKode;

class Pengembalian extends Model
{
    use HasKode;

    protected $prefix = 'PNG';
    protected $kodeField = 'kode_pengembalian';
    protected $fillable = [
        'kode_pengembalian',
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
