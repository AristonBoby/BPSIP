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
        Schema::create('analisa_sampels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('jenis_analisa',50);
            $table->foreignUuid('jenisPengujian_id');
            $table->foreignId('users_id');
            $table->char('status',1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('jenisPengujian_id')->references('id')->on('jenis_pengujian_sampels');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisa_sampels');
    }
};
