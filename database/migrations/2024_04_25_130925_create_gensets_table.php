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
        Schema::create('gensets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_id')->constrained()->onDelete('cascade');
            $table->string('keterangan');
            $table->boolean('ruangan_bersih')->default(true);
            $table->boolean('engine_bersih')->default(true);
            $table->integer('suhu_ruangan')->default(25);
            $table->integer('bbm_utama')->default(25);
            $table->integer('bbm_harian')->default(25);
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gensets');
    }
};
