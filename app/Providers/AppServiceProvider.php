<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);

        // Actualizar el last_seen si el usuario está autenticado
        if (Auth::check()) {
            Auth::user()->update([
                'last_seen' => Carbon::now(),
            ]);
        }
    }
}
