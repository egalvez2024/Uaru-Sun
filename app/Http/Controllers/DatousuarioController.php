<?php

namespace App\Http\Controllers;

use App\Models\Datousuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DatousuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuario = Auth::user();
        $datosUsuario = $usuario->datos;

        if ($datosUsuario) {
            return redirect()->route('informacion.edit', $datosUsuario->id);
        }

        return view('informacion.formulario_datos', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = new Datousuario;
        $datos->preferencias = $request->input('preferencias');
        $datos->fecha_nacimiento = $request->input('fecha_nacimiento');
        $datos->alias = $request->input('alias');
        $datos->telefono = $request->input('telefono');
        $datos->idiomas = $request->input('idiomas');
        $datos->deportes = $request->input('deportes');
        $datos->animal_favorito = $request->input('animal_favorito');
        $datos->ocupacion = $request->input('ocupacion');
        $datos->user_id = $request->input('user_id');

        if ($request->hasFile('foto_perfil')) {
            $file = $request->file('foto_perfil');
            $path = $request->file('foto_perfil')->store('perfiles', 'public');
            $datos->foto_perfil = $path;
      
            
        }

        $usuario = Auth::user();
        $usuario_id = $usuario->id;

        $user = User::findOrFail($usuario_id);
        $user->email = $request->input('email');
        $user->name = $request->input('usuario_name');
        $user->save();

        if ($datos->save()) {
            return redirect()->route('profile.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $informacion = Datousuario::findOrFail($id);
        $usuario = Auth::user();
        return view('informacion.formulario_datos', compact('informacion', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = Datousuario::findOrFail($id);
        $datos->preferencias = $request->input('preferencias');
        $datos->fecha_nacimiento = $request->input('fecha_nacimiento');
        $datos->alias = $request->input('alias');
        $datos->telefono = $request->input('telefono');
        $datos->idiomas = $request->input('idiomas');
        $datos->deportes = $request->input('deportes');
        $datos->animal_favorito = $request->input('animal_favorito');
        $datos->ocupacion = $request->input('ocupacion');

        if ($request->hasFile('foto_perfil')) {
            // Eliminar la foto de perfil anterior si existe
            if ($datos->foto_perfil) {
                Storage::delete($datos->foto_perfil);
            }
            $file = $request->file('foto_perfil');
            $path = $file->store('public/perfiles');
            $datos->foto_perfil = $path;
        }

        if ($request->hasFile('foto_perfil')) {
            $file = $request->file('foto_perfil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('perfil', $filename, 'public');
            $datos->foto_perfil = $path;
        }
        

        $usuario = Auth::user();
        $usuario_id = $usuario->id;

        $user = User::findOrFail($usuario_id);
        $user->email = $request->input('email');
        $user->name = $request->input('usuario_name');
        $user->save();

        $datos->save();
        return redirect()->route('profile.index')->with('success', 'Información actualizada correctamente');

        if ($datos->save()) {
            return redirect()->route('profile.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
