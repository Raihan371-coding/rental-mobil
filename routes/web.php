<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ServiceMobillController;
use App\Http\Controllers\DataBookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('mobil', MobilController::class);
// Route::resource('service', ServiceController::class);
// Route::resource('booking', BookingController::class);
