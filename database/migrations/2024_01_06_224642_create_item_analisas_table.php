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
        Schema::create('item_analisas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kodeSampel');
            $table->string('kodeLab');
            $table->string('keterangan')->nullable();
            $table->foreignUuid('jenisAnalisaSampel_id')->index();
            $table->foreignUuid('permintaan_analisas_id')->index();
            $table->softdeletes();
            $table->timestamps();
            $table->foreign('jenisAnalisaSampel_id')->references('id')->on('analisa_sampels');
            $table->foreign('permintaan_analisas_id')->references('id')->on('permintaan_analisas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_analisas');
    }
};
