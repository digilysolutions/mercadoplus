<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
			'short_code' => 'string',
			'description' => 'string',
            'currencyArray'=>'required',
			'code_currency_default' => 'string',
        ];
    }
    public function messages()
    {
        return [
            'currencyArray.required' => 'El campo "monedas" es obligatorio, para calcular la tasa de cambio ', // Mensaje personalizado
            'name.required' =>'El campo "nombre de la categoría"  es obligatorio',
            'description.string' => 'El campo de la descripcion debe ser un texto',
        ];
    }
}
