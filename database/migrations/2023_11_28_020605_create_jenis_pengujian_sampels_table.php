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
        Schema::create('jenis_pengujian_sampels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('jenis_pengujian',50);
            $table->char('status',1);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('jenis_pengujian_sampels');
    }
};
