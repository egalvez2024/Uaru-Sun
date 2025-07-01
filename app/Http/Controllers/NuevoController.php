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
        $usuario = Auth::user();
        if($usuario->role == 'admin'){
            $nuevos = Nuevo::orderBy('id', 'desc')->paginate(10);
        }
        else{
            $nuevos = Nuevo::where('user_id', $usuario->id)->orderBy('id', 'desc')->paginate(10);
        }

        return view('nuevos.nuevo_index', compact('nuevos', 'usuario'));
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
        $nuevo->estado = 'Pendiente';

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
        $usuario = Auth::user();
        $nuevo = Nuevo::findOrfail($id);
        return view('nuevos.nuevo_create', compact('nuevo', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->input('tipo') == 'editar'){
            $request->validate([
                'dato' => 'required|string|max:300',
                'estado' => 'required',
            ], [
                'dato.required' => 'La recomendación es obligatoria.',
                'estado.required' => 'El estado es requerido',
            ]);
        }
        else{
            $request->validate([
                'dato' => 'required|string|max:300',
            ], [
                'dato.required' => 'La recomendación es obligatoria.',
            ]);
        }

        $nuevo = Nuevo::findOrfail($id);
        $nuevo->dato = $request->input('dato');
        $nuevo->fecha = date('Y-m-d');
        $nuevo->user_id = $nuevo->user_id;
        $nuevo->estado = $request->input('estado') ?? 'Pendiente';

        $nuevo->save();

        return redirect()->route('nuevos.index')->with('success', 'Recomendación editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nuevo = Nuevo::findOrfail($id);
        if($nuevo->delete()){
            return redirect()->route('nuevos.index')->with('danger', 'Sugerencia eliminada correctamente.');
        }
    }
}
