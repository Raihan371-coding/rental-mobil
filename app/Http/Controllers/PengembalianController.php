<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengembalian;
use App\Models\Rental;
use App\Models\Customer;

class PengembalianController extends Controller
{
    public function index()
    {
        $data = Pengembalian::all();
        return view('admin.pengembalian.index', compact('data'));
    }

    /**
     * Customer: read-only pengembalian list (only their own rentals)
     */
    public function customerIndex()
    {
        $customer = Auth::user()?->customer;
        if ($customer) {
            $rentalIds = Rental::where('id_customer', $customer->id)->pluck('id');
            $data = Pengembalian::whereIn('id_rental', $rentalIds)->get();
        } else {
            $data = collect();
        }

        return view('customer.pengembalian.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pengembalian.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_rental' => 'required|integer',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_mobil' => 'required|string|max:255',
            'denda' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Pengembalian::create($validated);

        return redirect()->route('admin.pengembalian.index')->with('success', 'Data pengembalian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Pengembalian::findOrFail($id);
        return view('admin.pengembalian.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_rental' => 'required|integer',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_mobil' => 'required|string|max:255',
            'denda' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->update($validated);

        return redirect()->route('admin.pengembalian.index')->with('success', 'Data pengembalian berhasil diupdate');
    }

    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('admin.pengembalian.index')->with('success', 'Data pengembalian berhasil dihapus');
    }
}
