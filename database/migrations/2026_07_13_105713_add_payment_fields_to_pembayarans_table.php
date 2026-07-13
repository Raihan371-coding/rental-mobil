<?php
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {

            $table->string('bukti_pembayaran')->nullable();

            $table->enum('status_verifikasi', [
                'belum_upload',
                'menunggu',
                'diterima',
                'ditolak'
            ])->default('belum_upload');
        });
    }

    public function down(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {

            $table->dropColumn([
                'bukti_pembayaran',
                'status_verifikasi'
            ]);
        });
    }
};
