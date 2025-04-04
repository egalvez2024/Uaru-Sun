<?php

namespace App\Http\Controllers;

use App\Models\Species; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener especies con paginación
        $species = Species::with('category') 
                  ->latest()
                  ->paginate(12); // Muestra 9 por página

        return view('home', compact('species'));
    }
}
