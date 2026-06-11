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
        Schema::table('produccions', function (Blueprint $table) {

    $table->foreignId('venta_id')
          ->nullable()
          ->constrained('ventas')
          ->onDelete('cascade');

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produccions', function (Blueprint $table) {
            //
        });
    }
};
