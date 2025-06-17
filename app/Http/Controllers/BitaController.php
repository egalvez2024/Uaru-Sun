<?php


namespace App\Http\Controllers;
use App\Models\Bitacora;

use Illuminate\Http\Request;

class BitaController extends Controller
{
    public function index()
    {
  $registros = Bitacora::orderBy('fecha', 'desc')->get();
    return view('bitacora.bita', compact('registros'));    }


}

