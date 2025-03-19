<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'first_name' => 'string',
			'middle_name' => 'string',
			'last_name' => 'string',
			'gender' => 'string',
			'marital_status' => 'string',
			'blood_group' => 'string',
			'language' => 'string',
            'email' => 'nullable|string|email|unique:contacts,email',
            'useremail' => 'nullable|string|email|unique:users,email',

        ];
    }
    public function messages()
    {
        return [
            'useremail.unique' => 'El correo electrónico de usuario ya está en uso. Por favor, elige otro.',
            'email.unique' => 'El correo electrónico de contacto ya está en uso. Por favor, elige otro.',
        ];
    }
}
