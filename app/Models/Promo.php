<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasKode;

class Promo extends Model
{
    use HasKode;

    protected $prefix = 'PRM';
    protected $kodeField = 'kode_promo';
    protected $fillable = [
        'kode_promo',
        'potongan',
        'tanggal_mulai',
        'tanggal_selesai',
        'nama_promo',
        'jenis',
        'minimal_transaksi',
        'aktif',
    ];
    public function bookings()
    {
        return $this->hasMany(DataBooking::class);
    }
}
