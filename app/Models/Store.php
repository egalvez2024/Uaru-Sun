<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    // Definimos los campos que se pueden asignar masivamente
    protected $fillable = ['name', 'url'];
}
