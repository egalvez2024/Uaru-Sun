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

        $categoria = new Categoria();
        $categoria->nombre = 'Animales peligrosos';
        $categoria->tipo = 'fauna';
        $categoria->save();






    }
}
