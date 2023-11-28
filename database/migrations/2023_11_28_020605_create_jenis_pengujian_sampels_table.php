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
            $table->id();
            $table->string('jenis_pengujian');
            $table->integer(status,1);
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('jenis_pengujian_sampels');
    }
};