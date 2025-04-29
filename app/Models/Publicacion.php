<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publicacion extends Model
{
    
use HasFactory;

    protected $fillable = ['titulo', 'contenido', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
