<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
            'currency' => 'required|string',
            'country' => 'required|string',
            'path_flag' => 'string',
            'code' => 'required',
            'symbol' => 'required',
            'thousand_separator' => 'required',
            'decimal_separator' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'currency.required' => "El campo Moneda es obligatorio.",
            'country.required' => "El campo País es obligatorio.",
            'code.required' => " El campo code es obligatorio.",
            'symbol.required' => "El campo Símbolo es obligatorio.",
            'thousand_separator.required' => "El campo Separador de miles es obligatorio.",
            'decimal_separator.required' => "El campo Separador Decimal es obligatorio."




        ];
    }
}
