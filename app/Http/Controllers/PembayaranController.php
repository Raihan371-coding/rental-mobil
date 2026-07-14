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
        $data = Pembayaran::with('rental')
            ->latest()
            ->get();

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
        $rentals = Rental::with(['customer', 'mobil'])
            ->where('status', 'rental')
            ->get();

        return view('admin.pembayaran.create', compact('rentals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_rental'      => 'required|exists:rentals,id',
            'tanggal_bayar'  => 'required|date',
            'metode_bayar'   => 'required|string|max:50',
            'jumlah_bayar'   => 'required|numeric|min:0',
            'status_bayar' => 'required|in:belum_bayar,menunggu_verifikasi,lunas,ditolak',
        ]);

        Pembayaran::create($validated);

        return redirect()
            ->route('admin.pembayaran.index')
            ->with('success', 'Data pembayaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_rental'      => 'required|exists:rentals,id',
            'tanggal_bayar'  => 'required|date',
            'metode_bayar'   => 'required|string|max:50',
            'jumlah_bayar'   => 'required|numeric|min:0',
            'status_bayar'   => 'required|in:lunas,belum_lunas',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update($validated);

        return redirect()
            ->route('admin.pembayaran.index')
            ->with('success', 'Data pembayaran berhasil diupdate');
    }
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran berhasil dihapus');
    }
    public function showCustomer($id)
    {
        $customer = Auth::user()->customer;

        $pembayaran = Pembayaran::with('rental')
            ->whereHas('rental', function ($q) use ($customer) {
                $q->where('id_customer', $customer->id);
            })
            ->findOrFail($id);

        return view('customer.pembayaran.show', compact('pembayaran'));
    }
    public function uploadBukti(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        if ($request->hasFile('bukti_pembayaran')) {

            $namaFile = time() . '_' . $request->file('bukti_pembayaran')->getClientOriginalName();

            $request->file('bukti_pembayaran')
                ->move(public_path('bukti_pembayaran'), $namaFile);

            $pembayaran->update([
                'bukti_pembayaran' => $namaFile,

                // customer sudah upload
                'status_verifikasi' => 'menunggu',

                // pembayaran sekarang menunggu dicek admin
                'status_bayar' => 'menunggu_verifikasi'
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Bukti pembayaran berhasil dikirim, silakan tunggu verifikasi admin.');
    }
    public function terima($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([

            'status_bayar' => 'lunas',

            'status_verifikasi' => 'diterima'

        ]);

        return redirect()->back()->with(
            'success',
            'Pembayaran berhasil diverifikasi.'
        );
    }

    public function tolak($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([

            'status_bayar' => 'ditolak',

            'status_verifikasi' => 'ditolak'

        ]);

        return redirect()->back()->with(
            'success',
            'Pembayaran ditolak.'
        );
    }
}
