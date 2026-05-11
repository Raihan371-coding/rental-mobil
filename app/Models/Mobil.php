<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table= 'mobils';
    protected $primarykey = 'id';
    protected $fillable= [
        'nama_mobil',
        'merk',
        'plat_nomor',
        'tahun',
        'harga_sewa',
        'status',
    ];
    
}
