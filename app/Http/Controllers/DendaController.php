<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Denda;
use App\Models\Rental;

class DendaController extends Controller
{
    public function index()
    {
        $dendas = Denda::all();
        return view('admin.denda.index', compact('dendas'));
    }

    /**
     * Customer: read-only denda list (only their own rentals)
     */
    public function customerIndex()
    {
        $customer = Auth::user()?->customer;
        if ($customer) {
            $rentalIds = Rental::where('id_customer', $customer->id)->pluck('id');
            $dendas = Denda::whereIn('id_rental', $rentalIds)->get();
        } else {
            $dendas = collect();
        }

        return view('customer.denda.index', compact('dendas'));
    }

    public function create()
    {

        $rentals = Rental::all();
        return view('admin.denda.create', compact('rentals'));
    }

    public function store(Request $request)
    {
        Denda::create($request->all());
        return redirect()->route('admin.denda.index')->with('success', 'Data denda berhasil ditambahkan');
    }

    public function edit(Denda $denda)
    {
        $rentals = Rental::orderBy('kode_rental')->get();

        return view('admin.denda.edit', compact(
            'denda',
            'rentals'
        ));
    }

    public function update(Request $request, Denda $denda)
    {
        $denda->update($request->all());
        return redirect()->route('admin.denda.index')->with('success', 'Data denda berhasil diupdate');
    }

    public function destroy(Denda $denda)
    {
        $denda->delete();
        return redirect()->route('admin.denda.index')->with('success', 'Data denda berhasil dihapus');
    }
}
