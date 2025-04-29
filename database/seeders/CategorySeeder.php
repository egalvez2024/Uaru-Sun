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
            'nombre' => 'Flora',
            'tipo' => 'Planta'   
           
        ]);

        Categoria::create([
            'nombre' => 'Fauna',
            'tipo' => 'Animal'   
           
        ]);

        Categoria::create([
            'nombre' => 'Peligro de extincion',
            'tipo' => 'Riesgo'   
           
        ]);
        Categoria::create([
            'nombre' => 'Anfibio',
            'tipo' => 'Animal'   
           
        ]);
        Categoria::create([
            'nombre' => 'Arboles',
            'tipo' => 'Planta'   
           
        ]);
    }
    
}
