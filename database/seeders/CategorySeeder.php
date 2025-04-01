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
            'nombre' => 'Arboles',
            'tipo' => 'flora'
           
        ]);
        Categoria::create([
            'nombre' => 'Fauna',
            'tipo' => 'Animal'
           
        ]);
        Categoria::create([
            'nombre' => 'Flora',
            'tipo' => 'Planta'
        ]);
        Categoria::create([
            'nombre' => 'Peligro de Extincion',
            'tipo' => 'Peligro'
        ]);
        Categoria::create([
            'nombre' => 'Anfibios',
            'tipo' => 'reptil'
           
        ]);
        Categoria::create([
            'nombre' => 'Paisajes',
            'tipo' => ''
        ]);
    


    }
}
