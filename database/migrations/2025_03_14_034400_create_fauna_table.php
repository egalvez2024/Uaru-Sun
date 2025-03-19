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
        Schema::create('fauna', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nombre_cientifico')->nullable();
            $table->string('especie')->nullable();
            $table->string('habitat')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('categoria')->default('fauna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fauna');
    }
};
