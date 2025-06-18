<?php

namespace App\Http\Controllers;

use App\Models\Nuevo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NuevoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nuevos = Nuevo::orderBy('id', 'desc')->paginate(10);
        return view('nuevos.nuevo_index', compact('nuevos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nuevos.nuevo_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dato' => 'required|string|max:300',
        ], [
            'dato.required' => 'La recomendación es obligatoria.',
        ]);

        $usuario = Auth::user();

        $nuevo = new Nuevo();
        $nuevo->dato = $request->input('dato');
        $nuevo->fecha = date('Y-m-d');
        $nuevo->user_id = $usuario->id;

        $nuevo->save();

        return redirect()->route('nuevos.index')->with('success', 'Recomendación registrada correctamente.');
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
