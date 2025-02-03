<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        try {
            // Intenta obtener el usuario de Google
            $user = Socialite::driver('google')->user();

            // Busca el usuario en la base de datos
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                // Si el usuario ya existe, iniciar sesión
                Auth::login($finduser);
                switch ($finduser->role) {
                    case 'Centro Educativo':
                        return redirect()->route('educationalcenter.dashboard');
                    case 'Estudiante':
                        return redirect()->route('student.dashboard');
                    case "Tutor":
                        return redirect()->route('tutor.dashboard');
                    case "Validador":
                        return redirect()->route('validator.dashboard');
                    case 'Administrador':
                        return redirect()->route('admin.dashboard');
                    case "Usuario":
                        return redirect()->route('user.dashboard');
                }
               // return redirect()->intended('dashboard');
            } else {
                // Si no existe, crea un nuevo usuario
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'role' => 'Usuario',
                    'roleid' => 6,
                    'password' => Hash::make('Password1234'), // Considera usar una mejor manera de manejar contraseñas
                ]);

                // Inicia sesión con el nuevo usuario
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch (\Exception $e) {
            // Manejo de excepciones
            Log::error('Error de inicio de sesión con Google: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Algo salió mal durante el proceso de autenticación. Por favor, intenta nuevamente.');
        }
    }
}
