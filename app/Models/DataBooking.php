<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataBooking extends Model
{
    protected $table = 'data_bookings';

    protected $fillable = [
        'nama_pelanggan',
        'mobil_id',
        'tanggal_booking',
        'jam_booking',
        'status',
        'keterangan'
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }
}