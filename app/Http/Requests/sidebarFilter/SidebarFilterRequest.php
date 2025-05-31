<?php

namespace App\Http\Requests\sidebarFilter;

use Illuminate\Foundation\Http\FormRequest;

class SidebarFilterRequest extends FormRequest
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
            'photo' => 'sometimes|array',
            'join_at' => 'sometimes|array',
            'religion' => 'sometimes|array',
            'caste' => 'sometimes|array',
            'marital_status' => 'sometimes|array',
            'education' => 'sometimes|array',
            'employee_in' => 'sometimes|array',
            'occupation' => 'sometimes|array',
            'diet' => 'sometimes|array',
            'physical_status' => 'sometimes|array',
            'country' => 'sometimes|array',
            'state' => 'sometimes|array',
            'city' => 'sometimes|array',
            'income' => 'sometimes|array',
        ];
    }
}
