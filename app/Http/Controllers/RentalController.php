<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;
use App\Models\Customer;
use App\Models\Mobil;
use App\Models\DataBooking;

class RentalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function isAdmin(): bool
    {
        $user = Auth::user();
        return $user && ($user->isAdmin() || ($user->role ?? null) === 'admin');
    }

    protected function currentCustomer(): ?Customer
    {
        return Auth::user()?->customer ?? null;
    }

    public function index()
    {
        $data = Rental::all();
        return view('admin.rental.index', compact('data'));
    }

    /**
     * Customer: read-only rental list
     */
    public function customerIndex()
    {
        $customer = $this->currentCustomer();
        $data = $customer ? Rental::where('id_customer', $customer->id)->get() : collect();

        return view('customer.rental.index', compact('data', 'customer'));
    }

    public function create()
    {
        $customers = Customer::all();
        $mobils = Mobil::all();
        $bookings = DataBooking::all();

        return view('admin.rental.create', compact('customers', 'mobils', 'bookings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_rental' => 'required|string|max:255|unique:rentals,id_rental',
            'id_customer' => 'required|exists:customers,id',
            'id_mobil' => 'required|exists:mobils,id',
            'booking_id' => 'nullable|exists:data_bookings,id',
            'tanggal_rental' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_rental',
            'total_harga' => 'required|numeric|min:0',
            'status' => 'required|in:berjalan,selesai',
        ]);

        Rental::create($validated);

        return redirect()->route('admin.rental.index')->with('success', 'Data rental berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Rental::findOrFail($id);
        $customers = Customer::all();
        $mobils = Mobil::all();
        $bookings = DataBooking::all();

        return view('admin.rental.edit', compact('data', 'customers', 'mobils', 'bookings'));
    }

    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);

        $validated = $request->validate([
            'id_rental' => 'required|string|max:255|unique:rentals,id_rental,' . $rental->id,
            'id_customer' => 'required|exists:customers,id',
            'id_mobil' => 'required|exists:mobils,id',
            'booking_id' => 'nullable|exists:data_bookings,id',
            'tanggal_rental' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_rental',
            'total_harga' => 'required|numeric|min:0',
            'status' => 'required|in:berjalan,selesai',
        ]);

        $rental->update($validated);

        return redirect()->route('admin.rental.index')->with('success', 'Data rental berhasil diupdate');
    }

    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();
        return redirect()->route('admin.rental.index')->with('success', 'Data rental berhasil dihapus');
    }
}
