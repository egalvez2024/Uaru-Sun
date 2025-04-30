<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use database\factories\CategoriaFactory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Mamiferos',
            'tipo' => 'fauna'   
           
        ]);
        Categoria::create([
            'nombre' => 'flora',
            'tipo' => 'Planta'   
           
        ]);
        Categoria::create([
            'nombre' => 'Fauna',
            'tipo' => 'Animal'   
           
        ]);
        Categoria::create([
            'nombre' => 'Peligro de Extincion',
            'tipo' => 'Riesgo'   
           
        ]);
        Categoria::create([
            'nombre' => 'Anfibios',
            'tipo' => 'fauna'   
           
        ]);
        Categoria::create([
            'nombre' => 'Arboles',
            'tipo' => 'Flora'   
           
        ]);
        Categoria::create([
            'nombre' => 'Grupo de Aves',
            'tipo' => 'fauna'   
           
        ]);
        Categoria::create([
            'nombre' => 'Aniamales Herbivoros',
            'tipo' => 'fauna'   
           
        ]);

    }
    
}
