<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EspeciesController extends Controller
{
    public function index(Request $request)
{
    $query = Species::query();

    if ($request->has('search')) {
        $query->where('nombre', 'like', '%'.$request->search.'%')
              ->orWhere('nombre_cientifico', 'like', '%'.$request->search.'%');
    }

    $species = $query->paginate(12);
    return view('catalogo.index', compact('species'));
}

    public function show($id)
    {
        $specie = Species::findOrFail($id);
        $user = Auth::user();
        return view('catalogo.show', compact('specie', 'user'));
    }
}
