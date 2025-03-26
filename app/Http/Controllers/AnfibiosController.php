<?php

namespace App\Http\Controllers;

use App\Models\Categoria; // Asegúrate de que esta línea esté aquí
use App\Models\Species; // Asegúrate de importar también el modelo Species si no lo has hecho

class AnfibiosController extends Controller
{
    public function index()
    {
        // Buscar la categoría 'Anfibios'
        $categoriaFauna = Categoria::where('nombre', 'Anfibio')->first();
    
        // Obtener todas las especies que pertenecen a esta categoría
        $especies = Species::where('category_id', optional($categoriaFauna)->id)->get();
    
        // Retornar la vista con los datos
        return view('anfibio.index', compact('especies'));
    }
}
