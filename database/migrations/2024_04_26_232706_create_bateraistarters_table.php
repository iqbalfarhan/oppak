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
        Schema::create('bateraistarters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genset_id')->constrained()->onDelete('cascade');
            $table->integer('tegangan');
            $table->integer('bj_cell');
            $table->integer('bj_pilot_cell');
            $table->integer('elektrolit');
            $table->boolean('kencang')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bateraistarters');
    }
};
