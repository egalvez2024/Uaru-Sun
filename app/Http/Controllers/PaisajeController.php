<?php

namespace App\Http\Controllers;

use App\Models\Ecosistema;
use App\Models\Paisaje;
use Illuminate\Http\Request;

class PaisajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paisajes = Paisaje::Paginate(10);
        return view('paisajes.index_paisaje', compact('paisajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paisajes.formulario_paisaje');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'imagen' => 'required|mimes:jpg,jpeg,png|max:2048',
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'flora_nombre' => 'required',
            'fauna_nombre' => 'required',
        ], [
            'nombres.required' => 'El campo nombres es obligatorio.',
            'url.required' => 'La URL de la imagen es obligatoria.',
            'url.url' => 'La URL debe ser válida.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'ubicacion.required' => 'La ubicación es obligatoria.',
            'flora_nombre.required' => 'El nombre de la flora es obligatorio.',
            'fauna_nombre.required' => 'El nombre de la fauna es obligatorio.',
            'imagen.required' => 'La imagen es obligatoria.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'La imagen debe ser de tipo JPG o PNG.',
            'imagen.max' => 'La imagen no debe superar los 2MB.',
        ]);


        $paisaje = new Paisaje();
        $paisaje->nombres = $request->input('nombres');
        $archivo = $request->file('imagen');
        $ruta = $archivo->store('imagenes', 'public');
        $paisaje->url = $ruta;
        $paisaje->descripcion = $request->input('descripcion');
        $paisaje->ubicacion = $request->input('ubicacion');
        $paisaje->save();

        $flora = new Ecosistema();
        $flora->tipo = 'Flora';
        $flora->nombre = $request->input('flora_nombre');
        $flora->paisaje_id = $paisaje->id;

        $fauna = new Ecosistema();
        $fauna->tipo = 'Fauna';
        $fauna->nombre = $request->input('fauna_nombre');
        $fauna->paisaje_id = $paisaje->id;

        $flora->save();
        $fauna->save();
        return redirect()->route('paisajes.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paisaje = Paisaje::findOrfail($id);
        return view('paisajes.show_paisajes', compact('paisaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
