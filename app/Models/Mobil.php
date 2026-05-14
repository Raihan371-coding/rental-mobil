<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobils';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_mobil',
        'merk',
        'plat_nomor',
        'tahun',
        'harga_sewa',
        'status',
    ];

    // Relasi ke tabel service
    public function services()
    {
        return $this->hasMany(ServiceMobil::class);
    }
}
