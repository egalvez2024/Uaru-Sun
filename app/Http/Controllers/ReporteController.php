<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reportes = Reporte::orderBy('id', 'desc')->paginate(10);
        return view('reportes.reporte_index', compact('reportes'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reportes.reporte_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'mimes:jpg,jpeg,png|max:2048',
            'direccion' => 'required',
            'actividad' => 'required',
        ], [
            'direccion.required' => 'La dirección es obligatoria.',
            'actividad.required' => 'El tipo de actividad ilegal es obligatoria.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'La imagen debe ser de tipo JPG o PNG.',
            'imagen.max' => 'La imagen no debe superar los 2MB.',
        ]);
        $usuario = Auth::user();

        $reporte = new Reporte();
        $reporte->fecha = date('Y-m-d');
        $reporte->user_id = $usuario->id;
        $reporte->actividad = $request->input('actividad');
        $reporte->direccion = $request->input('direccion');
        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $ruta = $archivo->store('imagenes', 'public');
            $reporte->imagen = $ruta;
        }

        $reporte->save();
        return redirect()->route('home');
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
