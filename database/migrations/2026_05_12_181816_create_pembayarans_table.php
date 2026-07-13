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

            $table->string('kode_pembayaran')->unique();

            $table->integer('id_pembayaran')->unsigned();

            $table->foreignId('id_rental')
                ->constrained('rentals')
                ->onDelete('cascade');

            $table->date('tanggal_bayar')->nullable();

            $table->enum('metode_bayar', [
                'QRIS',
                'Transfer',
                'Belum Dipilih'
            ]);

            $table->decimal('jumlah_bayar', 10, 2);


            $table->enum('status_bayar', [
                'belum_bayar',
                'menunggu_verifikasi',
                'lunas',
                'ditolak'
            ])->default('belum_bayar');

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
