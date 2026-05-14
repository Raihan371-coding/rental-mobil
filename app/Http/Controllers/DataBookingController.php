<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBooking;
use App\Models\Mobil;

class DataBookingController extends Controller
{
    public function index()
    {
        $bookings = DataBooking::with('mobil')->get();

        return view('databooking.index', compact('bookings'));
    }

    public function create()
    {
        $mobils = Mobil::all();

        return view('databooking.create', compact('mobils'));
    }

    public function store(Request $request)
    {
        DataBooking::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'mobil_id' => $request->mobil_id,
            'tanggal_booking' => $request->tanggal_booking,
            'jam_booking' => $request->jam_booking,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/booking')
            ->with('success', 'Data booking berhasil ditambahkan');
    }

    public function edit($id)
    {
        $booking = DataBooking::findOrFail($id);
        $mobils = Mobil::all();

        return view('databooking.edit', compact('booking', 'mobils'));
    }

    public function update(Request $request, $id)
    {
        $booking = DataBooking::findOrFail($id);

        $booking->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'mobil_id' => $request->mobil_id,
            'tanggal_booking' => $request->tanggal_booking,
            'jam_booking' => $request->jam_booking,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/booking')
            ->with('success', 'Data booking berhasil diupdate');
    }

    public function destroy($id)
    {
        $booking = DataBooking::findOrFail($id);
        $booking->delete();

        return redirect('/booking')
            ->with('success', 'Data booking berhasil dihapus');
    }
}
