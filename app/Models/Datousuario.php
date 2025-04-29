<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datousuario extends Model
{
    protected $fillable = [
        // añade aquí foto_perfil y cualquier otro campo
        'foto_perfil',
        'user_id',
        // …
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
        
    }
}
