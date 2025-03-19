<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class PasswordValidator
{
    public static function validate(array $data)
    {
        return Validator::make(
            $data,
            [
                'password' => [
                    'required',
                    'string',
                    Password::min(8),
                    'regex:/[A-Z]/',   // Requiere al menos una mayúscula
                    'regex:/[a-z]/',   // Requiere al menos una minúscula
                    'regex:/[0-9]/',   // Requiere al menos un número
                    'regex:/[!@#$%^&*(),.?":{}|<>]/', // Requiere al menos un símbolo
                    // Requiere mínimo 8 caracteres.  Se usa Password::min(8) para usar el mensaje traducible.

                ],
            ],
            [
                'password.regex' => 'La contraseña debe cumplir con los siguientes requisitos:  al menos una mayúscula, una minúscula, un número y un símbolo.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            ]
        );
    }
}
