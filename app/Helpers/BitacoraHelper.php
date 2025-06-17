<?php

namespace App\Helpers;

use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use App\Helpers\BitacoraHelper;

BitacoraHelper::registrar('Tu mensaje de acción aquí');

class BitacoraHelper
{
    public static function registrar($accion)
    {
        Bitacora::create([
            'accion' => $accion,
            'usuario' => Auth::check() ? Auth::user()->name : 'Invitado',
            'fecha' => now(),
        ]);
    }
}
