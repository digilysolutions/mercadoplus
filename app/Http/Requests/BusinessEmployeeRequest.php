<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessEmployeeRequest extends FormRequest
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
			'employee_id' => 'required',
			'business_id' => 'required',
			'email_business' => 'string',
			'person_statuses_message' => 'string',
			'jobTitle' => 'string',
			'department' => 'string',
			'role' => 'string',
        ];
    }
}
