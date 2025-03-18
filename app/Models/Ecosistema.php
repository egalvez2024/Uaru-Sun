<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecosistema extends Model
{
    public function paisaje()
    {
        return $this->belongsTo(Paisaje::class);
    }
}
