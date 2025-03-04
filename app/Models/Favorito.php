<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Species;
use App\Models\User;

class Favorito extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'species_id'];

    public function species()
    {
        return $this->belongsTo(Species::class, 'species_id'); // 'specie_id' debe coincidir con la clave foránea
    }


    public function user(){
        return $this->belongsTo(User::class);

    }
}