<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorito;
use App\Models\Species;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    public function index() {
        $favoritos = Favorito::where('user_id', Auth::id())->with('species')->get();
        return view('favoritos.index', compact('favoritos'));
    }

    public function store(Request $request) {
        $request->validate([
            'species_id' => 'required|exists:species,id'
        ]);

        Favorito::firstOrCreate([
            'user_id' => Auth::id(),
            'species_id' => $request->species_id
        ]);

        return back()->with('success', 'Añadido a Favoritos');
    }

    public function destroy($id){
        $favorito = Favorito::where('user_id', Auth::id())->where('species_id', $id)->first();
        
        if ($favorito) {
            $favorito->delete();
            return back()->with('success', 'Eliminado de Favoritos');
        }

        return back()->with('error', 'No encontrado');
    }
}