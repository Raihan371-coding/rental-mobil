<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengembalian;
use App\Models\Rental;
use App\Models\Customer;
use App\Models\Denda;
use App\Models\ServiceMobil;

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
        $rentals = Rental::where('status', 'rental')->get();

        return view('admin.pengembalian.create', compact('rentals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_rental' => 'required|exists:rentals,id',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_mobil' => 'required|string|max:255',
            'denda' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $pengembalian = Pengembalian::create($validated);
        $rental = Rental::findOrFail($validated['id_rental']);

        $rental->update([
            'status' => 'kembali'
        ]);

        if (strtolower($validated['kondisi_mobil']) == 'rusak') {

            // Mobil masuk service
            $rental->mobil->update([
                'status' => 'service'
            ]);

            // Buat data service otomatis
            ServiceMobil::create([
                'mobil_id'        => $rental->id_mobil,
                'tanggal_service' => now(),
                'biaya_service'   => 0,
                'deskripsi'       => $validated['keterangan'] ?? 'Kerusakan saat pengembalian',
                'status_service'  => 'pending'
            ]);
        } else {

            // Mobil siap disewakan kembali
            $rental->mobil->update([
                'status' => 'tersedia'
            ]);
        }

        if ($validated['denda'] > 0) {

            Denda::create([
                'id_rental'      => $validated['id_rental'],
                'jumlah_denda'   => $validated['denda'],
                'keterangan'     => $validated['keterangan'],
            ]);
        }

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
        $rental = Rental::findOrFail($validated['id_rental']);

        $rental->update([
            'status' => 'kembali'
        ]);

        $rental->mobil->update([
            'status' => 'tersedia'
        ]);
        Denda::updateOrCreate(

            [
                'id_rental' => $validated['id_rental']
            ],

            [
                'jumlah_denda' => $validated['denda'],
                'keterangan' => $validated['keterangan']
            ]

        );
        return redirect()->route('admin.pengembalian.index')->with('success', 'Data pengembalian berhasil diupdate');
    }

    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $rental = Rental::findOrFail($pengembalian->id_rental);

        $rental->update([
            'status' => 'rental'
        ]);

        $rental->mobil->update([
            'status' => 'disewa'
        ]);
        $pengembalian->delete();

        return redirect()->route('admin.pengembalian.index')->with('success', 'Data pengembalian berhasil dihapus');
    }
}
