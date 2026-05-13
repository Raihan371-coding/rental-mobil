<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $fillable = [
    'rental_id',
    'jumlah_denda',
    'keterangan'
];

public function rental()
{
    return $this->belongsTo(Rental::class);
}
}
