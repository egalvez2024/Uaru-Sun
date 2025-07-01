<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::orderBy('id', 'desc')->paginate(10);
        $usuario = Auth::user();
        return view('eventos.evento_index', compact('eventos', 'usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eventos.evento_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'descripcion' => 'required|string|max:300',
            'fecha_evento' => 'required|date',
            'hora_evento' => 'required',
            'direccion' => 'required|string|max:300',
        ], [
            'descripcion.required' => 'La descripción del evento es obligatoria.',
            'fecha_evento.required' => 'La fecha del evento es obligatoria.',
            'hora_evento.required' => 'La hora del evento es obligatoria.',
            'direccion.required' => 'La dirección del evento es obligatoria.',
        ]);

        $usuario = Auth::user();

        $evento = new Evento();
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha_evento = $request->input('fecha_evento');
        $evento->hora_evento = $request->input('hora_evento');
        $evento->url = $request->input('direccion');
        $evento->user_id = $usuario->id;

        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento guardado correctamente.');

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
        $evento = Evento::findOrfail($id);
        $usuario = Auth::user();
        return view('eventos.evento_create', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evento = Evento::findOrfail($id);
        $request->validate([
            'descripcion' => 'required|string|max:300',
            'fecha_evento' => 'required|date',
            'hora_evento' => 'required',
            'direccion' => 'required|string|max:300',
        ], [
            'descripcion.required' => 'La descripción del evento es obligatoria.',
            'fecha_evento.required' => 'La fecha del evento es obligatoria.',
            'hora_evento.required' => 'La hora del evento es obligatoria.',
            'direccion.required' => 'La dirección del evento es obligatoria.',
        ]);

        $evento->descripcion = $request->input('descripcion');
        $evento->fecha_evento = $request->input('fecha_evento');
        $evento->hora_evento = $request->input('hora_evento');
        $evento->url = $request->input('direccion');
        $evento->user_id = $evento->user_id;

        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento editado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evento = Evento::findOrfail($id);
        if($evento->delete()){
            return redirect()->route('eventos.index')->with('danger', 'Evento eliminado correctamente.');
        }

    }
}
