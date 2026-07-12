<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataBooking extends Model
{
    protected $table = 'data_bookings';

    protected $fillable = [
        'nama_pelanggan',
        'customer_id',
        'mobil_id',
        'tanggal_booking',
        'jam_booking',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_booking' => 'date',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
