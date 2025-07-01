<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnfermedadPlanta extends Model
{
    use HasFactory;

    protected $table = 'enfermedades_plantas'; // <- esto soluciona el problema

    protected $fillable = [
        'nombre_planta',
        'nombre_enfermedad',
        'sintomas',
        'causas',
        'solucion',
        'imagen',
    ];
}
