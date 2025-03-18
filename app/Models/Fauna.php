<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fauna extends Model
{
    use HasFactory;

    protected $table = 'fauna'; // Asegura que el nombre coincida con la base de datos
}
