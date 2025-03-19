<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use App\Models\Person;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'activated' => true,
                'password' => Hash::make($request->password),
                'verification_token' => Str::random(40),
                'verification_code' => random_int(100000, 999999), // Generar un código de 6 dígitos
                'role' => 'Usuario',
                'roleid' => 6
            ]);


            $person = Person::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'lastname' => $request->lastname,
                    'phone' => $request->lastname,
                    'activated' => true,
                    'user_id' => $user->id
                ]
            );

            $student = Student::create(
                [
                    'name' => $request->name,
                    'activated' => true,
                    'course' => $request->course,
                    'people_id' => $person->id,
                    'membership_id' => null,

                ]
            );
            event(new Registered($user));
           // Auth::login($user);
            Mail::to($user->email)->send(new VerificationEmail($user));
            DB::commit();
            return redirect()->route('thankYou');
            // Confirma la transacción si todo es exitoso
            //se envia para una pagina dandole las gracias por registrarse y dandole las idnicaciones del correo que revise su correo
          //  return redirect()->route('user.dashboard');
        } catch (\Exception $e) {
            DB::rollback(); // Revierte la transacción en caso de error
            return back()->withErrors(['error' => 'Ocurrió un error al procesar la solicitud.']); // Devuelve un mensaje de error
        }
    }

    public function verify($token)
    {
        // Verifica que el token existe
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/')->with('error', 'Token de verificación inválido o expirado.');
        }

        return view('auth.verify', compact('user'));
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'verification_code' => 'required|integer',
            'verification_token' => 'required|string',
        ]);

        $user = User::where('email', $request->email)
                    ->where('verification_token', $request->verification_token)
                    ->first();


        if (!$user || $user->verification_code !== (int)$request->verification_code) {
            return response()->json(['error' => 'Código de verificación inválido'], 400);
        }

        $user->is_verified = true;
        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->verification_token = null;
        $user->save();
        Auth::login($user);
        return redirect()->route('user.dashboard');
       // return response()->json(['message' => '¡Correo verificado exitosamente! Puedes iniciar sesión.']);
    }
    public function thankYou()
    {
        return view('user.thankyou'); // Aquí llamas a la vista de agradecimiento
    }
}
