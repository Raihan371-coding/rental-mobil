<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_mobils', function (Blueprint $table) {
            $table->id();
            $table->string('kode_service')->unique();
            $table->foreignId('mobil_id')->constrained('mobils')->onDelete('cascade');
            $table->date('tanggal_service');
            $table->integer('biaya_service');
            $table->text('deskripsi');
            $table->enum('status_service', [
                'pending',
                'proses',
                'selesai'
            ]);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_mobils');
    }
};
