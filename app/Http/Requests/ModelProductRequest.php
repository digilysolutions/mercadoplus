<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelProductRequest extends FormRequest
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
			'name' => 'required|string',
			'description' => 'string',
			'characteristics' => 'string',
            'brand_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'brand_id.required' => 'El campo "Marca es obligatorio. Un Modelo de pertenece a una marca', // Mensaje personalizado
           
        ];
    }
}
