<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceMobil extends Model
{
    protected $table = 'service_mobils';

    protected $fillable = [
        'mobil_id',
        'tanggal_service',
        'biaya_service',
        'deskripsi',
        'status_service'
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}