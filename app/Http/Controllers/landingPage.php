<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use App\Models\Mobil;

class landingPage extends Controller
{
    public function index()
    {
        $mobils = Mobil::where('status', 'tersedia')
            ->latest()
            ->take(6)
            ->get();

        $promos = Promo::whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->get();

        return view('welcome', compact('mobils', 'promos'));
    }
    public function mobil()
    {
        $mobils = Mobil::where('status', 'tersedia')->get();

        return view('landing.mobil', compact('mobils'));
    }

    public function promo()
    {
        $promos = Promo::whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->get();

        return view('landing.promo', compact('promos'));
    }
}
