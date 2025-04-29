<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Categoria; 
use App\Models\Species;

class ProfileController extends Controller
{
    
    
    public function index()
    {

        $user = auth::user();
        $posts = $user->posts;

        $categoriaFauna = Categoria::where('nombre', 'Fauna')->first(); 
        $categoriaFlora = Categoria::where('nombre', 'Flora')->first();

        $likes = $user->likes()->with('species')->get();

        // Obtener todas las especies que pertenecen a esta categoría
        $especies = Species::all();

        // Retornar la vista con los datos
        return view('profile.index', compact('user', 'posts', 'especies', 'likes'));

    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Si el usuario ha subido una nueva imagen de perfil
        if ($request->hasFile('foto_perfil')) {
            // Validar la imagen (por ejemplo, asegurarnos de que sea una imagen válida)
            $validatedData = $request->validate([
                'foto_perfil' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Limitar el tamaño a 2MB
            ]);

            // Eliminar la imagen anterior si existe
            if ($user->datos && $user->datos->foto_perfil) {
                $oldImagePath = public_path('storage/' . $user->datos->foto_perfil);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);  // Eliminar imagen anterior
                }
            }

            // Subir la nueva imagen y obtener la ruta de la imagen almacenada
            $imagePath = $request->file('foto_perfil')->store('profile_pictures', 'public');

            // Actualizar el campo foto_perfil con la nueva ruta
            $user->datos()->update([
                'foto_perfil' => $imagePath
            ]);
        }

        // Actualizar otros datos del usuario
        $user->fill($request->validated());

        // Si el email ha cambiado, se debe verificar
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}


