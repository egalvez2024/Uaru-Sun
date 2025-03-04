<?php

namespace App\Http\Controllers;

use App\Models\Species;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioPostController extends Controller
{
    public function index()
    {
        $species = Species::latest()->paginate(10);
        return view('UsuarioPost.index', compact('species'));
    }

    public function create()
{
    $categories = Categoria::all();
    return view('UsuarioPost.create', compact('categories'));


}


public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|max:255',
        'nombre_cientifico' => 'required|max:255',
        'descripcion' => 'required',
        'habitat' => 'required',
        'location' => 'required',
        'image' => 'required|image|max:2048',
        'category_id' => 'required|exists:categories,id'
    ]);

    $imagePath = $request->file('image')->store('especies', 'public');

    Species::create([
        'nombre' => $validated['nombre'],
        'nombre_cientifico' => $validated['nombre_cientifico'],
        'descripcion' => $validated['descripcion'],
        'habitat' => $validated['habitat'],
        'location' => $validated['location'],
        'image_path' => $imagePath,
        'category_id' => $validated['category_id']
    ]);

    return redirect()->route('UsuarioPost.index')->with('success', 'Especie creada!');
}

}
