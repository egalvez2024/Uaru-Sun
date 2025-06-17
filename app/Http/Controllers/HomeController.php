<?php

namespace App\Http\Controllers;

use App\Models\Species; 
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener especies con paginación
        $species = Species::with('category')
                  ->latest()
                  ->paginate(12);

        // Obtener usuarios conectados en los últimos 3 minutos
        $onlineUsers = User::where('last_seen', '>=', Carbon::now()->subMinutes(3))->get();

        return view('home', compact('species', 'onlineUsers'));
    }
}
