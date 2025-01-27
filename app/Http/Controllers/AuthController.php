<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('app.login');
    }

    // Iniciar sesión
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticarse
        if (Auth::attempt($credentials, $request->remember)) {
            // Redirigir al usuario a la ruta deseada
            return redirect()->intended('dashboard');
        }

        // Si la autenticación falla
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('app.register');
    }

    // Registrar un nuevo usuario
    public function register(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Autenticar al usuario recién registrado
        Auth::login($user);

        // Redirigir al usuario
        return redirect('dashboard');
    }
}
