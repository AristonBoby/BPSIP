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
        Schema::create('permintaan_analisas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->smallInteger('jumContoh');
            $table->smallInteger('beratContoh');
            $table->string('bentukContoh');
            $table->string('kondisiContoh');
            $table->string('jenisKemasan');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_analisas');
    }
};
