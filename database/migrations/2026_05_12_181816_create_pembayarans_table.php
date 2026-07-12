<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pembayaran')->unsigned();
            $table->foreignId('id_rental')->constrained('rentals')->onDelete('cascade');
            $table->date('tanggal_bayar');
            $table->string('metode_bayar');
            $table->decimal('jumlah_bayar', 10, 2);
            $table->enum('status_bayar', ['lunas', 'belum_lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
