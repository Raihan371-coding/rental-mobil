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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pengembalian')->unique();
            $table->foreignId('id_rental')->constrained('rentals')->onDelete('cascade');
            $table->date('tanggal_pengembalian');
            $table->enum('kondisi_mobil', ['baik', 'rusak']);
            $table->decimal('denda', 10, 2);
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
