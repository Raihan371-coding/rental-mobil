<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return view('admin.promo.index', compact('promos'));
    }

    /**
     * Customer: read-only promo list
     */
    public function customerIndex()
    {
        $promos = Promo::all();
        return view('customer.promo.index', compact('promos'));
    }

    public function create()
    {
        return view('admin.promo.create');
    }

    public function store(Request $request)
    {
        Promo::create($request->all());
        return redirect()->route('admin.promo.index')->with('success', 'Data promo berhasil ditambahkan');
    }

    public function edit(Promo $promo)
    {
        return view('admin.promo.edit', compact('promo'));
    }

    public function update(Request $request, Promo $promo)
    {
        $promo->update($request->all());
        return redirect()->route('admin.promo.index')->with('success', 'Data promo berhasil diupdate');
    }

    public function destroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('admin.promo.index')->with('success', 'Data promo berhasil dihapus');
    }
}
