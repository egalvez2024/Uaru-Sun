<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paisaje extends Model
{
    use HasFactory;

    public function ecosistemas()
    {
        return $this->hasMany(Ecosistema::class);
    }
}
