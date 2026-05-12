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
Route::get('/pengembalian/create', [PengembalianController::class, 'create']);
Route::post('/pengembalian/store', [PengembalianController::class, 'store']);
Route::get('/pengembalian/edit/{id}', [PengembalianController::class, 'edit']);
Route::post('/pengembalian/update/{id}', [PengembalianController::class, 'update']);
Route::get('/pengembalian/destroy/{id}', [PengembalianController::class, 'destroy']);

// Rental routes
Route::resource('rental', RentalController::class);
Route::get('/rental/create', [RentalController::class, 'create']);
Route::post('/rental/store', [RentalController::class, 'store']);
Route::get('/rental/edit/{id}', [RentalController::class, 'edit']);
Route::post('/rental/update/{id}', [RentalController::class, 'update']);
Route::get('/rental/destroy/{id}', [RentalController::class, 'destroy']);

// Pembayaran routes
Route::resource('pembayaran', PembayaranController::class);
Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
Route::post('/pembayaran/store', [PembayaranController::class, 'store']);
Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);
Route::post('/pembayaran/update/{id}', [PembayaranController::class, 'update']);
Route::get('/pembayaran/destroy/{id}', [PembayaranController::class, 'destroy']);
