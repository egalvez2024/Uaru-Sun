<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function specie()
    {
        return $this->belongsTo(Species::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
