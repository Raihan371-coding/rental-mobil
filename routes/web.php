<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ServiceMobillController;
use App\Http\Controllers\DataBookingController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\PembayaranController;

Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('home.admin');
})->name('home');
Route::resource('mobil', MobilController::class);
Route::resource('service', ServiceMobillController::class);
Route::resource('booking', DataBookingController::class);

// Pengembalian routes
Route::resource('pengembalian', PengembalianController::class);

// Rental routes
Route::resource('rental', RentalController::class);

// Pembayaran routes
Route::resource('pembayaran', PembayaranController::class);
