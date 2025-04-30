<?php

namespace App\Http\Controllers;

use App\Models\Datousuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DatousuarioController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $usuario = Auth::user();
        $datosUsuario = $usuario->datos;

        if ($datosUsuario) {
            return redirect()->route('informacion.edit', $datosUsuario->id);
        }

        return view('informacion.formulario_datos', compact('usuario'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_name' => 'required',
            'email' => 'required|email',
            'foto_perfil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'usuario_name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser válido.',
        ]);

        $datos = new Datousuario;
        $datos->preferencias = $request->input('preferencias');
        $datos->fecha_nacimiento = $request->input('fecha_nacimiento');
        $datos->alias = $request->input('alias');
        $datos->telefono = $request->input('telefono');
        $datos->idiomas = $request->input('idiomas');
        $datos->deportes = $request->input('deportes');
        $datos->animal_favorito = $request->input('animal_favorito');
        $datos->ocupacion = $request->input('ocupacion');
        $datos->user_id = Auth::id();

        // Manejo de imagen de perfil
        if ($request->hasFile('foto_perfil')) {
            $path = $request->file('foto_perfil')->store('public/fotos_perfil');
            $datos->foto_perfil = basename($path);
        }

        // Actualizar datos del usuario
        $user = Auth::user();
        $user->email = $request->input('email');
        $user->name = $request->input('usuario_name');
        $user->save();

        if ($datos->save()) {
            return redirect()->route('profile.index');
        }

        $path = $request->file('foto_perfil')->store('perfiles', 'public');
        $datos->foto_perfil = $path;

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $informacion = Datousuario::findOrFail($id);
        $usuario = Auth::user();
        return view('informacion.formulario_datos', compact('informacion', 'usuario'));
    }

    public function update(Request $request, string $id)
    {

        
        $request->validate([
            'usuario_name' => 'required',
            'email' => 'required|email',
            'foto_perfil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'usuario_name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser válido.',
        ]);

        $datos = Datousuario::findOrFail($id);
        $datos->preferencias = $request->input('preferencias');
        $datos->fecha_nacimiento = $request->input('fecha_nacimiento');
        $datos->alias = $request->input('alias');
        $datos->telefono = $request->input('telefono');
        $datos->idiomas = $request->input('idiomas');
        $datos->deportes = $request->input('deportes');
        $datos->animal_favorito = $request->input('animal_favorito');
        $datos->ocupacion = $request->input('ocupacion');

        // Manejo de imagen de perfil
        if ($request->hasFile('foto_perfil')) {
            // Borra la imagen anterior si existe
            if ($datos->foto_perfil) {
                Storage::delete('public/fotos_perfil/' . $datos->foto_perfil);
            }
            $path = $request->file('foto_perfil')->store('public/fotos_perfil');
            $datos->foto_perfil = basename($path);

            $path = $request->file('foto_perfil')->store('perfiles', 'public');
            $datos->foto_perfil = $path;

        }

        // Actualizar datos del usuario
        $user = Auth::user();
        $user->email = $request->input('email');
        $user->name = $request->input('usuario_name');
        $user->save();

        if ($datos->save()) {
            return redirect()->route('profile.index');
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
