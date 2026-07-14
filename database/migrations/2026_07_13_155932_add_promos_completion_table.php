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
        Schema::table('promos', function (Blueprint $table) {
            $table->string('nama_promo');
            $table->enum('jenis',[
                'persentase',
                'nominal'
            ]);
            $table->integer('minimal_transaksi')->default(0);
            $table->boolean('aktif')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table) {

            $table->dropColumn([
                'nama_promo',
                'jenis',
                'minimal_transaksi',
                'aktif',
            ]);
        });
    }
};
