<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        if (!Auth::check())
            return view('auth.login');
        else
            $roleid = Auth::user()->roleid;

        // Redirigir al dashboard correspondiente
        switch ($roleid) {
            case 1:
                Log::info("Cao 5");
                return redirect()->route('admin.dashboard');
                Log::info("Cao 6");
            case 2:
                return redirect()->route('user.dashboard');
            case 3:
                Log::info("Cao 4");
                return redirect()->route('gestor.dashboard');
            default:
                return redirect('/');
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'credential' => 'required|string',
            'password' => 'required',
                    ]);

        $credential = $request->credential;

        // Buscar el usuario por nombre o correo electrónico
        $user = User::join('people', 'users.id', '=', 'people.user_id')
        ->join('contacts', 'people.contact_id', '=', 'contacts.id') // Une con la tabla contacts
        ->where('contacts.phone', $credential) // Cambia 'people.phone' a 'contacts.phone'
        ->orWhere('users.name', $credential)
        ->select('users.*') // Selecciona solo datos de usuarios
        ->first();
                  if ($user && Auth::attempt(['id' => $user->id, 'password' => $request->password])) {
            // Autenticación exitosa: el usuario existe y las credenciales son correctas
            // **********************************************************************
            // Obtener el rol del usuario
            $user = Auth::user();
            $roleid = $user->roleid;

            // Redirigir al dashboard correspondiente
            switch ($roleid) {
                case 1:
                    return redirect()->route('admin.dashboard');
                case 2:
                    return redirect()->route('user.dashboard');
                case 3:
                    return redirect()->route('gestor.dashboard');
                default:
                    return redirect('/');
            }
        } else {

                // El usuario no existe con las credenciales proporcionadas (email y/o código incorrectos)
                return back()->withErrors([
                    'email' => 'Las credenciales (usuario, No. Celular y/o código de seguimiento) proporcionadas no coinciden con nuestros registros.',
                ]);
            }
        }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
