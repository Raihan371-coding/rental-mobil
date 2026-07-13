<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasKode;

class ServiceMobil extends Model
{
    use HasKode;
    protected $prefix = 'SRV';
    protected $kodeField = 'kode_service';
    protected $table = 'service_mobils';

    protected $fillable = [
        'kode_service',
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
