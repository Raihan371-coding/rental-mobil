<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasKode;

class Denda extends Model
{
    use HasKode;

    protected $prefix = 'DND';

    protected $kodeField = 'kode_denda';
    protected $fillable = [
        'kode_denda',
        'id_rental',
        'jumlah_denda',
        'keterangan'
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class, 'id_rental');
    }
}
