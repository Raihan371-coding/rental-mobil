<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pembayaran;
use App\Models\Rental;

class PembayaranController extends Controller
{
    public function index()
    {
        $data = Pembayaran::all();
        return view('admin.pembayaran.index', compact('data'));
    }

    /**
     * Customer: read-only pembayaran list (only their own rentals)
     */
    public function customerIndex()
    {
        $customer = Auth::user()?->customer;
        if ($customer) {
            $rentalIds = Rental::where('id_customer', $customer->id)->pluck('id');
            $data = Pembayaran::whereIn('id_rental', $rentalIds)->get();
        } else {
            $data = collect();
        }

        return view('customer.pembayaran.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pembayaran.create');
    }

    public function store(Request $request)
    {
        Pembayaran::create($request->all());
        return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($request->all());
        return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran berhasil diupdate');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran berhasil dihapus');
    }
}
