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
        Schema::create('transaksi_analisas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('item_analisa_id')->index();
            $table->foreignUuid('jenis_pemeriksaan_sampels_id')->index();
            $table->foreign('item_analisa_id')->references('id')->on('item_analisas')->cascadeOnDelete();
            $table->foreign('jenis_pemeriksaan_sampels_id')->references('id')->on('jenis_pemeriksaan_sampels')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_analisas');
    }
};
