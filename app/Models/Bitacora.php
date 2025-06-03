<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacoras';

    protected $fillable = [
        'fecha',
        'usuario',
        'accion',
    ];

    public $timestamps = true;
}
