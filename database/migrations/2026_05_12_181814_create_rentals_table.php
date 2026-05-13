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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rental')->unsigned();
            $table->integer('id_customer')->unsigned();
            $table->integer('id_mobil')->unsigned();
            $table->date('tanggal_rental');
            $table->date('tanggal_kembali');
            $table->decimal('total_harga', 10, 2);
            $table->enum('status', ['rental', 'kembali']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
