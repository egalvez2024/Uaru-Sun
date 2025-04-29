<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Species;

use App\Models\Categoria;


class ProfileController extends Controller
{
    
    public function index() {
        


        $user = auth()->user();
        $posts = $user->posts; // Suponiendo que haya una relación con Post
        return view('profile.index', compact('user'))->with('posts', $user->posts ?? collect());
    }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
    
        // Validar todos los campos necesarios (incluye la imagen si está presente)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'foto_perfil' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        // Actualizar nombre y correo
        $user->fill([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);
    
        // Si cambió el email, reiniciar verificación
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        $user->save(); // Guardar cambios del usuario
    
        // Si se subió una nueva imagen
        if ($request->hasFile('foto_perfil')) {
            // Eliminar imagen anterior si existe
            if ($user->datos && $user->datos->foto_perfil) {
                $oldImagePath = public_path('storage/' . $user->datos->foto_perfil);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Guardar nueva imagen
            $imagePath = $request->file('foto_perfil')->store('profile_pictures', 'public');
    
            // Actualizar campo de imagen en la relación
            $user->datos()->update([
                'foto_perfil' => $imagePath,
            ]);
        }
    
        return redirect()->back()->with('success', 'Perfil actualizado correctamente.');


        
            // Subir la nueva imagen y obtener la ruta de la imagen almacenada
            $imagePath = $request->file('foto_perfil')->store('profile_pictures', 'public');

            dd($request->all());

            // Actualizar el campo foto_perfil con la nueva ruta
            $user->datos()->update([
                'foto_perfil' => $imagePath
            ]);
        }

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
