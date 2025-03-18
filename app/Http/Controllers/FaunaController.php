<?php

namespace App\Http\Controllers;
use App\Models\Fauna;
use App\Models\Species;
use App\Models\Categoria;

use Illuminate\Http\Request;

class FaunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Buscar la categoría 'fauna'
    $categoriaFauna = Categoria::where('nombre', 'Fauna')->first();

    // Obtener todas las especies que pertenecen a esta categoría
    $especies = Species::where('category_id', optional($categoriaFauna)->id)->get();


    // Retornar la vista con los datos
    return view('fauna.index', compact('especies'));
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
