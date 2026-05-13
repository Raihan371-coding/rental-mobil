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
