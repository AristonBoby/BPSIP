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
        Schema::create('jenis_pemeriksaan_sampels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('itemPemeriksaan',25);
            $table->bigInteger('harga');
            $table->foreignId('user_id');
            $table->uuid('analisa_sampel_id');
            $table->char('status',1);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('analisa_sampel_id')->references('id')->on('analisa_sampels');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pemeriksaan_sampels');
    }
};
