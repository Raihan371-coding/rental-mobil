<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasKode;

class Customer extends Model
{

    use HasKode;

    protected $prefix = 'CST';

    protected $kodeField = 'kode_customer';
    protected $fillable = [
        'kode_customer',
        'user_id',
        'nama',
        'alamat',
        'no_identitas',
        'no_telp',
        'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class, 'id_customer');
    }

    public function bookings()
    {
        return $this->hasMany(DataBooking::class, 'customer_id');
    }
}
