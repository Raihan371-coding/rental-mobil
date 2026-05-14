<?php

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

Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('home.admin');
})->name('home');
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