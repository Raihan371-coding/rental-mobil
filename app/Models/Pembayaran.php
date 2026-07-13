<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasKode;

class Pembayaran extends Model
{
    use HasKode;

    protected $prefix = 'PMB';

    protected $kodeField = 'kode_pembayaran';
    protected $fillable = [
        'kode_pembayaran',
        'id_rental',
        'tanggal_bayar',
        'metode_bayar',
        'jumlah_bayar',
        'status_bayar',
        'bukti_pembayaran',
        'status_verifikasi',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class, 'id_rental');
    }
}
