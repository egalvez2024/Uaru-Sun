<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Species;
use App\Models\Categoria; // <-- Añade esto
class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Categoria::firstOrCreate([
            'nombre' => 'Aves' // Cambia esto según tu esquema
        ]);
        Species::create([
            'nombre' => 'Guacamaya Roja',
            'nombre_cientifico' => 'Ara macao',
            'descripcion' => 'Colorida ave...',
            'habitat' => 'Selvas tropicales',
            'image_path' => 'species/guacamaya.jpg',
            'location' => 'Mosquitia Hondureña',
            'category_id' => $category->id // <- Añade esta línea
        ]);
    }
}
