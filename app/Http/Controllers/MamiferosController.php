<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MamiferosController extends Controller
{
    public function index()
    {
        // Buscar la categoría 'Anfibios'
        $categoriaFauna = Categoria::where('nombre', 'Mamifero')->first();
    
        // Obtener todas las especies que pertenecen a esta categoría
        $especies = Species::where('category_id', optional($categoriaFauna)->id)->get();
    
        // Retornar la vista con los datos
        return view('mamifero.index', compact('especies'));
    }
}
