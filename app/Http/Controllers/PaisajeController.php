<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
