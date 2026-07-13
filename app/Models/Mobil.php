<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasKode;

class Mobil extends Model
{
    use HasKode;

    protected $prefix = 'MBL';

    protected $kodeField = 'kode_mobil';
    protected $table = 'mobils';

    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_mobil',
        'nama_mobil',
        'merk',
        'plat_nomor',
        'tahun',
        'harga_sewa',
        'status',
        'foto',
    ];

    // Relasi ke tabel service
    public function services()
    {
        return $this->hasMany(ServiceMobil::class);
    }
}
