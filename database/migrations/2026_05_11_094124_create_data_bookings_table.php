<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('set null');
            $table->foreignId('mobil_id')
                ->constrained('mobils')
                ->onDelete('cascade');
            $table->date('tanggal_booking');
            $table->time('jam_booking');
            $table->enum('status', ['menunggu konfirmasi', 'terkonfirmasi', 'ditolak'])->default('menunggu konfirmasi');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_bookings');
    }
};
