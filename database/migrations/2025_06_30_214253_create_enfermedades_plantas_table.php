<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfermedadesPlantasTable extends Migration
{
    public function up()
    {
        Schema::create('enfermedades_plantas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_planta');
            $table->string('nombre_enfermedad');
            $table->text('sintomas');
            $table->text('causas')->nullable();
            $table->text('solucion');
            $table->string('imagen')->nullable(); // opcional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enfermedades_plantas');
    }
}
