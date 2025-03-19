<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserHelper
{
    public static function createDefaultUser($name, $lastname,$role,$role_id)
    {
        // Inicializar correo electrónico y lastname
        $baseEmail = strtolower($name) . '.' . strtolower($lastname) . '@fundacionmagistral.org';
        $email = $baseEmail;
        $suffix = 1;

        // Comprobar si el correo electrónico ya existe y generar uno único
        while (User::where('email', $email)->exists()) {
            $email = strtolower($name) . '.' . strtolower($lastname) . $suffix . '@fundacionmagistral.org';
            $suffix++;
        }

        // Generar contraseña segura
        $password = self::generateSecurePassword();

        // Crear el usuario
        $user = User::create([
            'name' => $name,

            'email' => $email,
            'password' =>  Hash::make($password),
            'activated' => true,
            'role' => $role,
            'roleid' => $role_id,
            'activated' => true,
        ]);

        return [
            'message' => 'Usuario creado exitosamente',
            'user' => $user,
            'email' =>  $email ,

            'password' => $password // Puede ser útil para depuración, evita mostrarla en producción.
        ];
    }

    private static function generateSecurePassword()
    {
        // Generar una contraseña segura que cumpla los requisitos
        return Str::random(8) . 'A@1'; // Ejemplo simple, modifica según tus necesidades
    }
}
