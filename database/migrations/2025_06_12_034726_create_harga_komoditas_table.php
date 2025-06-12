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
        Schema::create('harga_komoditas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('komoditas_id')->constrained('komoditas')->onDelete('cascade');
            $table->string('bulan'); // Misal: "Januari"
            $table->integer('harga'); // Harga dalam rupiah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_komoditas');
    }
};
