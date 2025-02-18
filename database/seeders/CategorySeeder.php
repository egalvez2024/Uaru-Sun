<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Fauna',
            'tipo' => 'animal'
        ]);

        Categoria::create([
            'nombre' => 'Flora',
            'tipo' => 'planta'
        ]);
    }
}