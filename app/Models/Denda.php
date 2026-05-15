<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $fillable = [
    'id_rental',
    'jumlah_denda',
    'keterangan'
];

public function rental()
{
    return $this->belongsTo(Rental::class);
}
}
