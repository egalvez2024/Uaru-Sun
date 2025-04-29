<?php

namespace App\Http\Controllers;

use App\Models\Peligroso;
use App\Models\Species;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsuarioPostController extends Controller
{
    public function index()
    {
        $species = Species::latest()->paginate(10);
        return view('UsuarioPost.index', compact('species'));

        $user = Auth::user();
    $posts = Post::where('user_id', $user->id)->get();

    return view('posts.index', compact('posts'));
    }

    public function create()
{
    $categories = Categoria::all();
    return view('UsuarioPost.create', compact('categories'));


}

public function search(Request $request)
{
    $query = $request->input('query');

    $posts = UsuarioPost::where('titulo', 'like', '%' . $query . '%')
                         ->orWhere('contenido', 'like', '%' . $query . '%')
                         ->paginate(10);

    return view('usuario_posts.index', compact('posts', 'query'));
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

    if($request->input('category_id') == 2) {
        $peligro = new Peligroso();
        $peligro->nombre = $request->input('nombre');
        $peligro->nombre_cientifico = $request->input('nombre_cientifico');
        $peligro->descripcion = $request->input('descripcion');
        $peligro->habitat = $request->input('habitat');
        $peligro->ubicacion = $request->input('location');
        $peligro->imagen = $imagePath;
        $peligro->save();
    }

    return redirect()->route('UsuarioPost.index')->with('success', 'Especie creada!');
}

}

