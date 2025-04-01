<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvesController extends Controller
{

    public function index()
    {
        // Buscar la categoría 'Anfibios'
        $categoriaFauna = Categoria::where('nombre', 'Aves')->first();
    
        // Obtener todas las especies que pertenecen a esta categoría
        $especies = Species::where('category_id', optional($categoriaFauna)->id)->get();
    
        // Retornar la vista con los datos
        return view('aves.index', compact('especies'));
    }
   
}
