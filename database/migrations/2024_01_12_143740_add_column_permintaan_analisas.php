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
        Schema::table('permintaan_analisas', function (Blueprint $table) {
            $table->string('no_spk', 100)->nullable()->after('id')->unique();
            $table->date('tanggal')->nullable()->after('user_id');
            $table->string('status',1)->nullable()->after('user_id');
            $table->string('status_daftar',1)->nullable()->after('user_id');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permintaan_analisas', function (Blueprint $table) {
            $table->dropColumn('no_spk');
            $table->dropColumn('tanggal');
            $table->dropColumn('status');
        });
    }
};
