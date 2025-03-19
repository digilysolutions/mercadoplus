<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
			'temporary_id' => 'string',
			'subtotal_amount' => 'required',
			'total_amount' => 'required',
			'currency' => 'required|string',
			'address' => 'string',
			'home_delivery' => 'required',
			'purchase_date' => 'required',
			'time_unit' => 'string',
        ];
    }
}
