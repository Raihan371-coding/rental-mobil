<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\DataBooking;
use App\Models\Mobil;

class DataBookingController extends Controller
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
        if ($this->isAdmin()) {
            $bookings = DataBooking::with(['mobil', 'customer'])->get();
            return view('admin.booking.index', compact('bookings'));
        }

        $customer = $this->currentCustomer();
        $bookings = $customer ? DataBooking::with('mobil')->where('customer_id', $customer->id)->get() : collect();

        return view('customer.booking.index', compact('bookings', 'customer'));
    }

    public function create(Request $request)
    {
        if ($this->isAdmin()) {
            $mobils = Mobil::all();
            $customers = Customer::all();
            return view('admin.booking.create', compact('mobils', 'customers'));
        }

        // Customer: only show available cars
        $mobils = Mobil::where('status', 'tersedia')->get();
        $customer = $this->currentCustomer();
        $selectedMobilId = $request->query('mobil_id');

        return view('customer.booking.create', compact('mobils', 'customer', 'selectedMobilId'));
    }

    public function store(Request $request)
    {
        $isAdmin = $this->isAdmin();

        // Different validation rules for admin vs customer
        if ($isAdmin) {
            $validated = $request->validate([
                'customer_id' => 'nullable|exists:customers,id',
                'nama_pelanggan' => 'required|string|max:255',
                'mobil_id' => 'required|exists:mobils,id',
                'tanggal_booking' => 'required|date',
                'jam_booking' => 'required',
                'tanggal_mulai' => 'nullable|date',
                'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
                'status' => 'required|in:menunggu konfirmasi,terkonfirmasi,ditolak',
                'keterangan' => 'nullable|string',
            ]);

            if (! empty($validated['customer_id'])) {
                $customerRecord = Customer::find($validated['customer_id']);
                $validated['nama_pelanggan'] = $customerRecord?->nama ?? $validated['nama_pelanggan'];
            }
        } else {
            $validated = $request->validate([
                'mobil_id' => 'required|exists:mobils,id',
                'tanggal_booking' => 'required|date',
                'jam_booking' => 'required',
                'tanggal_mulai' => 'required|date|after_or_equal:today',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'keterangan' => 'nullable|string',
            ]);

            $customer = $this->currentCustomer();
            if (! $customer) {
                return redirect()->route('customer.profile')
                    ->with('error', 'Silakan lengkapi profil customer terlebih dahulu sebelum melakukan booking.');
            }

            $validated['customer_id'] = $customer->id;
            $validated['nama_pelanggan'] = $customer->nama;
            $validated['status'] = 'menunggu konfirmasi';
        }

        DataBooking::create($validated);

        $route = $isAdmin ? 'admin.booking.index' : 'customer.booking.index';
        return redirect()->route($route)
            ->with('success', 'Data booking berhasil ditambahkan');
    }

    public function edit($id)
    {
        $booking = DataBooking::findOrFail($id);

        if ($this->isAdmin()) {
            $mobils = Mobil::all();
            $customers = Customer::all();
            return view('admin.booking.edit', compact('booking', 'mobils', 'customers'));
        }

        $customer = $this->currentCustomer();
        abort_if(! $customer || $booking->customer_id !== $customer->id, 403);

        // Customer can only edit bookings that are still "menunggu konfirmasi"
        abort_if($booking->status !== 'menunggu konfirmasi', 403, 'Booking yang sudah dikonfirmasi/ditolak tidak dapat diubah.');

        $mobils = Mobil::where('status', 'tersedia')->get();
        return view('customer.booking.edit', compact('booking', 'mobils', 'customer'));
    }

    public function update(Request $request, $id)
    {
        $booking = DataBooking::findOrFail($id);
        $isAdmin = $this->isAdmin();

        if ($isAdmin) {
            $validated = $request->validate([
                'customer_id' => 'nullable|exists:customers,id',
                'nama_pelanggan' => 'required|string|max:255',
                'mobil_id' => 'required|exists:mobils,id',
                'tanggal_booking' => 'required|date',
                'jam_booking' => 'required',
                'tanggal_mulai' => 'nullable|date',
                'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
                'status' => 'required|in:menunggu konfirmasi,terkonfirmasi,ditolak',
                'keterangan' => 'nullable|string',
            ]);

            if (! empty($validated['customer_id'])) {
                $customerRecord = Customer::find($validated['customer_id']);
                $validated['nama_pelanggan'] = $customerRecord?->nama ?? $validated['nama_pelanggan'];
            }
        } else {
            $customer = $this->currentCustomer();
            abort_if(! $customer || $booking->customer_id !== $customer->id, 403);
            abort_if($booking->status !== 'menunggu konfirmasi', 403, 'Booking yang sudah dikonfirmasi/ditolak tidak dapat diubah.');

            $validated = $request->validate([
                'mobil_id' => 'required|exists:mobils,id',
                'tanggal_booking' => 'required|date',
                'jam_booking' => 'required',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'keterangan' => 'nullable|string',
            ]);

            $validated['customer_id'] = $customer->id;
            $validated['nama_pelanggan'] = $customer->nama;
        }

        $booking->update($validated);

        $route = $isAdmin ? 'admin.booking.index' : 'customer.booking.index';
        return redirect()->route($route)
            ->with('success', 'Data booking berhasil diupdate');
    }

    public function destroy($id)
    {
        $booking = DataBooking::findOrFail($id);

        if (! $this->isAdmin()) {
            $customer = $this->currentCustomer();
            abort_if(! $customer || $booking->customer_id !== $customer->id, 403);
            abort_if($booking->status !== 'menunggu konfirmasi', 403, 'Booking yang sudah dikonfirmasi/ditolak tidak dapat dihapus.');
        }

        $booking->delete();

        $route = $this->isAdmin() ? 'admin.booking.index' : 'customer.booking.index';
        return redirect()->route($route)
            ->with('success', 'Data booking berhasil dihapus');
    }
}
