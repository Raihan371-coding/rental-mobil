<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ServiceMobilController;
use App\Http\Controllers\DataBookingController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\landingPage;
use App\Models\Promo;
use App\Models\Mobil;

// Landing page (public)
Route::redirect('/', '/welcome');
Route::get('/', function () {

    $mobils = Mobil::where('status', 'tersedia')
        ->latest()
        ->take(6)
        ->get();

    $promos = Promo::whereDate('tanggal_mulai', '<=', now())
        ->whereDate('tanggal_selesai', '>=', now())
        ->latest()
        ->take(4)
        ->get();

    return view('welcome', compact(
        'mobils',
        'promos'
    ));
})->name('home');
Route::get('/mobil', [landingPage::class, 'mobil'])->name('landing.mobil');
Route::get('/promo', [landingPage::class, 'promo'])->name('landing.promo');

/*
|--------------------------------------------------------------------------
| Admin Routes — prefix: /admin, middleware: auth + admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Mobil CRUD
    Route::resource('mobil', MobilController::class);

    // Service CRUD
    Route::resource('service', ServiceMobilController::class);

    // Booking CRUD
    Route::resource('booking', DataBookingController::class)->parameters(['booking' => 'booking']);

    // Pengembalian CRUD
    Route::resource('pengembalian', PengembalianController::class);

    // Rental CRUD
    Route::resource('rental', RentalController::class);

    // Pembayaran CRUD
    Route::resource('pembayaran', PembayaranController::class);

    // Customer CRUD
    Route::resource('customer', CustomerController::class);

    // Denda CRUD
    Route::resource('denda', DendaController::class);

    // Promo CRUD
    Route::resource('promo', PromoController::class);
    Route::put(
        '/pembayaran/{id}/terima',
        [PembayaranController::class, 'terima']
    )->name('pembayaran.terima');

    Route::put(
        '/pembayaran/{id}/tolak',
        [PembayaranController::class, 'tolak']
    )->name('pembayaran.tolak');
});

/*
|--------------------------------------------------------------------------
| Customer Routes — prefix: /customer, middleware: auth
|--------------------------------------------------------------------------
*/
Route::prefix('customer')->middleware(['auth'])->name('customer.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');

    // Katalog Mobil (read-only)
    Route::get('/mobil', [MobilController::class, 'customerIndex'])->name('mobil.index');

    // Booking (index, create, store, edit, update, destroy)
    Route::resource('booking', DataBookingController::class)->parameters(['booking' => 'booking']);

    // Rental (index only)
    Route::get('/rental', [RentalController::class, 'customerIndex'])->name('rental.index');

    // Pengembalian (index only)
    Route::get('/pengembalian', [PengembalianController::class, 'customerIndex'])->name('pengembalian.index');

    // Pembayaran Customer
    Route::get('/pembayaran', [PembayaranController::class, 'customerIndex'])
        ->name('pembayaran.index');

    Route::get('/pembayaran/{id}', [PembayaranController::class, 'showCustomer'])
        ->name('pembayaran.show');

    Route::post('/pembayaran/{id}/upload', [PembayaranController::class, 'uploadBukti'])
        ->name('pembayaran.upload');

    // Denda (index only)
    Route::get('/denda', [DendaController::class, 'customerIndex'])->name('denda.index');

    // Promo (index only)
    Route::get('/promo', [PromoController::class, 'customerIndex'])->name('promo.index');

    // Profile
    Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
    Route::post('/profile', [CustomerController::class, 'updateProfile'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Auth Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
