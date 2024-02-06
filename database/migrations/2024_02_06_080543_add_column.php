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
        Schema::table('item_analisas', function(Blueprint $table){
            $table->integer('harga')->after('permintaan_analisas_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_analisas', function(Blueprint $table){
            $table->dropColumn('harga');
        });
    }
};
