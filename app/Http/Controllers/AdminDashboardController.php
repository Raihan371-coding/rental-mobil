<?php


namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Customer;
use App\Models\DataBooking;
use App\Models\Rental;
use App\Models\Pembayaran;
use App\Models\Promo;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalMobil = Mobil::count();

        $mobilTersedia = Mobil::where('status', 'tersedia')->count();

        $mobilDisewa = Mobil::where('status', 'disewa')->count();

        $totalCustomer = Customer::count();

        $totalBooking = DataBooking::count();

        $bookingMenunggu = DataBooking::where(
            'status',
            'menunggu konfirmasi'
        )->count();

        $bookingKonfirmasi = DataBooking::where(
            'status',
            'terkonfirmasi'
        )->count();

        $bookingDitolak = DataBooking::where(
            'status',
            'ditolak'
        )->count();

        $totalRental = Rental::count();

        $pendapatan = Pembayaran::where(
            'status_bayar',
            'lunas'
        )->sum('jumlah_bayar');

        $promoAktif = Promo::whereDate(
            'tanggal_mulai',
            '<=',
            now()
        )
            ->whereDate(
                'tanggal_selesai',
                '>=',
                now()
            )
            ->count();

        return view('admin.dashboard', compact(
            'totalMobil',
            'mobilTersedia',
            'mobilDisewa',
            'totalCustomer',
            'totalBooking',
            'bookingMenunggu',
            'bookingKonfirmasi',
            'bookingDitolak',
            'totalRental',
            'pendapatan',
            'promoAktif'
        ));
    }
}
