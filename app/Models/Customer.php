<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
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
