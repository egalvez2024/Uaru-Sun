<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\User;

class AdminController extends Controller
{


public function verUsuarios()
{
    $usuarios = User::all();
    return view('admin.usuarios', compact('usuarios'));
}

}
