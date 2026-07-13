<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasKode;

class Rental extends Model
{
    use HasKode;

    protected $prefix = 'RNT';
    protected $kodeField = 'kode_rental';
    protected $fillable = [
        'kode_rental',
        'id_customer',
        'id_mobil',
        'booking_id',
        'tanggal_rental',
        'tanggal_kembali',
        'total_harga',
        'status',
    ];

    protected $casts = [
        'tanggal_rental' => 'date',
        'tanggal_kembali' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }

    public function booking()
    {
        return $this->belongsTo(DataBooking::class, 'booking_id');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'id_rental');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_rental');
    }

    public function denda()
    {
        return $this->hasOne(Denda::class, 'id_rental');
    }
}
