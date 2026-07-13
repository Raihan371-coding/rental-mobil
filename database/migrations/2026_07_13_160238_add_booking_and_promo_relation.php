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
        Schema::table('data_bookings', function (Blueprint $table) {
            $table->foreignId('promo_id')->nullable()->constrained('promos')->nullOnDelete();
            $table->integer('diskon')->default(0);
            $table->integer('total_bayar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_bookings', function (Blueprint $table) {

            $table->dropColumn([
                'promo_id',
                'diskon',
                'total_bayar',
            ]);
        });
    }
};
