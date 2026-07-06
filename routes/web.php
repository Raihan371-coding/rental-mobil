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

Route::redirect('/', '/welcome');
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('mobil', MobilController::class);
Route::resource('service', ServiceMobilController::class);
Route::resource('booking', DataBookingController::class);

// Pengembalian routes
Route::resource('pengembalian', PengembalianController::class);

// Rental routes
Route::resource('rental', RentalController::class);

// Pembayaran routes
Route::resource('pembayaran', PembayaranController::class);

// Customer routes
Route::resource('customer', CustomerController::class);

// Denda routes
Route::resource('denda', DendaController::class);

// Promo routes
Route::resource('promo', PromoController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
