<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use App\Models\Mobil;

class landingPage extends Controller
{
    public function index()
    {
        $mobils = Mobil::latest()
            ->take(3)
            ->get();

        $promos = Promo::latest()
            ->take(3)
            ->get();

        return view('welcome', compact('mobils', 'promos'));
    }
    public function mobil()
    {
        $mobils = Mobil::latest()->get();

        return view('landing.mobil', compact('mobils'));
    }
    public function landing()
    {
        $mobils = Mobil::latest()
            ->take(3)
            ->get();
        return view('components.cars', compact('mobils'));
    }

    public function promo()
    {
        $promos = Promo::latest()
            ->take(9)
            ->get();

        return view('landing.promo', compact('promos'));
    }
}
