<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasKode;

class DataBooking extends Model
{
    use HasKode;

    protected $prefix = 'BKG';
    protected $kodeField = 'kode_booking';
    protected $table = 'data_bookings';

    protected $fillable = [
        'kode_booking',
        'customer_id',
        'mobil_id',
        'promo_id',
        'nama_pelanggan',
        'tanggal_booking',
        'jam_booking',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'potongan',
        'keterangan',
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
    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }

    public function getTotalHargaAttribute()
    {
        if (!$this->mobil || !$this->tanggal_mulai || !$this->tanggal_selesai) {
            return 0;
        }

        $lamaHari = max(
            1,
            $this->tanggal_mulai->diffInDays($this->tanggal_selesai)
        );

        $subtotal = $lamaHari * $this->mobil->harga_sewa;

        return max(0, $subtotal - ($this->potongan ?? 0));
    }
}
