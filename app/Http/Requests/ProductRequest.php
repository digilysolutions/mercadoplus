<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sku' => 'integer|nullable', // Cambiado de bigint a integer
            'description' => 'string|nullable',
            'description_small' => 'string|nullable',
            'code_currency_default' => 'string|nullable',
            'views' => 'integer|nullable',
            'sales' => 'integer|nullable',
            'weight' => 'decimal|nullable',
            'height' => 'decimal|nullable',
            'width' => 'decimal|nullable',
            'length' => 'numeric|nullable',
            'brand_id' => 'numeric|nullable',
            'model_id' => 'numeric|nullable',
            'unit_id' => 'numeric|nullable',
            'created_at' => 'datetime|nullable',
            'updated_at' => 'datetime|nullable',
            'category_id' => 'required|numeric'



        ];

    }
}
