<?php

namespace App\Http\Controllers;

use App\Models\EnfermedadPlanta;
use Illuminate\Http\Request;

class EnfermedadPlantaController extends Controller
{
    public function index()
    {
        $enfermedades = EnfermedadPlanta::all();
        return view('enfermedades.index', compact('enfermedades'));
    }

    public function create()
    {
        return view('enfermedades.create');
    }

    public function store(Request $request)
    {
        // Validaciones
        $validated = $request->validate([
            'nombre_planta' => 'required|string|max:255',
            'nombre_enfermedad' => 'required|string|max:255',
            'sintomas' => 'required|string',
            'causas' => 'nullable|string',
            'solucion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Guardar imagen si existe
        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('enfermedades', 'public');
        }

        // Guardar en la base de datos
        EnfermedadPlanta::create($validated);

        return redirect()->route('enfermedades.index')->with('success', 'Enfermedad registrada exitosamente.');
    }
}
