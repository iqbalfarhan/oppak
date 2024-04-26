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
        Schema::create('amfs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_id')->constrained()->onDelete('cascade');
            $table->boolean('ruangan_bersih')->default(true);
            $table->boolean('engine_bersih')->default(true);
            $table->json('tegangan')->nullable();
            $table->json('arus')->nullable();
            $table->integer('kwh')->nullable();
            $table->integer('jam_jalan_genset')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amfs');
    }
};
