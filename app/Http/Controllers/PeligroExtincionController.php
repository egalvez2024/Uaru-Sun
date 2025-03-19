<?php

namespace App\Http\Controllers;

use App\Models\Species;
use App\Models\Categoria;
use Illuminate\Http\Request;

class PeligroExtincionController extends Controller
{
    public function index()
{
    // Buscar la categoría 'fauna'
    $categoriaFauna = Categoria::where('nombre', 'Peligro de extincion')->first();

    // Obtener todas las especies que pertenecen a esta categoría
    $especies = Species::where('category_id', optional($categoriaFauna)->id)->get();


    // Retornar la vista con los datos
    return view('peligro.index', compact('especies'));
}
}
