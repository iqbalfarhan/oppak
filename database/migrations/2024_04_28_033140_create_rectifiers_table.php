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
        Schema::create('rectifiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_id')->constrained()->onDelete('cascade');
            $table->string('keterangan');
            $table->integer('catuan_input');
            $table->integer('tegangan_output');
            $table->integer('arus_output');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rectifiers');
    }
};
