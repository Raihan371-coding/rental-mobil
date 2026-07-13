<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\DataBooking;
use App\Models\Mobil;
use App\Models\Rental;
use App\Models\Pembayaran;
use App\Models\Promo;
use Carbon\Carbon;

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

        $customer = $this->currentCustomer();
        if (! $customer) {
            return redirect()->route('customer.profile')
                ->with('error', 'Silakan lengkapi profil customer terlebih dahulu sebelum melakukan booking.');
        }

        // Customer: only show available cars
        $mobils = Mobil::where('status', 'tersedia')->get();
        $selectedMobilId = $request->query('mobil_id');
        $promos = Promo::whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->get();

        return view(
            'customer.booking.create',
            compact(
                'mobils',
                'customer',
                'selectedMobilId',
                'promos'
            )
        );
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
                'promo_id' => 'nullable|exists:promos,id',
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
                'promo_id' => 'nullable|exists:promos,id',
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
            $mobil = Mobil::findOrFail($validated['mobil_id']);

            $mulai = Carbon::parse($validated['tanggal_mulai']);
            $selesai = Carbon::parse($validated['tanggal_selesai']);

            $lamaHari = max(1, $mulai->diffInDays($selesai));

            $subtotal = $lamaHari * $mobil->harga_sewa;

            $potongan = 0;

            if ($request->filled('promo_id')) {

                $promo = Promo::find($request->promo_id);

                if (
                    now()->between(
                        $promo->tanggal_mulai,
                        $promo->tanggal_selesai
                    )
                ) {

                    if ($promo->jenis == 'persentase') {
                        $potongan = ($subtotal * $promo->potongan) / 100;
                    } else {
                        $potongan = $promo->potongan;
                    }
                }
            }

            $total = max(0, $subtotal - $potongan);

            $validated['promo_id'] = $request->promo_id;
            $validated['potongan'] = $potongan;
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

            if (!empty($validated['customer_id'])) {
                $customerRecord = Customer::find($validated['customer_id']);
                $validated['nama_pelanggan'] = $customerRecord?->nama ?? $validated['nama_pelanggan'];
            }
        } else {

            $customer = $this->currentCustomer();

            abort_if(
                !$customer || $booking->customer_id != $customer->id,
                403
            );

            abort_if(
                $booking->status != 'menunggu konfirmasi',
                403,
                'Booking yang sudah dikonfirmasi tidak dapat diubah.'
            );

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

        // Simpan perubahan booking terlebih dahulu
        $booking->update($validated);

        /*
    |--------------------------------------------------------------------------
    | Jika booking dikonfirmasi oleh admin
    |--------------------------------------------------------------------------
    */

        if ($isAdmin && $booking->status == 'terkonfirmasi') {

            // Jangan buat rental dua kali
            $rental = Rental::where('booking_id', $booking->id)->first();

            if (!$rental) {

                $mobil = Mobil::findOrFail($booking->mobil_id);

                $tanggalMulai = Carbon::parse($booking->tanggal_mulai);
                $tanggalSelesai = Carbon::parse($booking->tanggal_selesai);

                $lamaHari = $tanggalMulai->diffInDays($tanggalSelesai);

                $totalHarga = $lamaHari * $mobil->harga_sewa;

                $potongan = $booking->potongan ?? 0;

                $totalBayar = max(0, $totalHarga - $potongan);
                /*
            |--------------------------------------------------------------------------
            | Buat Rental
            |--------------------------------------------------------------------------
            */

                $rental = Rental::create([
                    'id_customer'      => $booking->customer_id,
                    'id_mobil'         => $booking->mobil_id,
                    'booking_id'       => $booking->id,
                    'tanggal_rental'   => $booking->tanggal_mulai,
                    'tanggal_kembali'  => $booking->tanggal_selesai,
                    'total_harga'      => $totalBayar,
                    'status'           => 'rental',
                ]);

                /*
            |--------------------------------------------------------------------------
            | Buat Tagihan Pembayaran
            |--------------------------------------------------------------------------
            */

                Pembayaran::create([
                    'id_rental'     => $rental->id,
                    'tanggal_bayar' => now(),
                    'metode_bayar'  => 'Belum Dipilih',
                    'jumlah_bayar'  => $totalBayar,
                    'status_bayar'  => 'belum_bayar',
                ]);

                /*
            |--------------------------------------------------------------------------
            | Ubah status mobil
            |--------------------------------------------------------------------------
            */

                $mobil->update([
                    'status' => 'disewa'
                ]);
            }
        }

        $route = $isAdmin
            ? 'admin.booking.index'
            : 'customer.booking.index';

        return redirect()
            ->route($route)
            ->with('success', 'Data booking berhasil diupdate.');
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
