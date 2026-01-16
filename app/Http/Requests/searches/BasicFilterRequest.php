<?php

namespace App\Http\Requests\searches;

use Illuminate\Foundation\Http\FormRequest;

class BasicFilterRequest extends FormRequest
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
        return  [
            'min_age' => 'required|integer',
            'max_age' => 'required|integer',
            'min_height' => 'required|integer',
            'max_height' => 'required|integer',
            'marital_status' => 'sometimes|array',
            'marital_status.*' => 'numeric',
            'children' => 'sometimes|array',
            'children.*' => 'numeric',
            'religion' => 'sometimes|array',
            'religion.*' => 'numeric',
            'caste' => 'sometimes|array',
            'caste.*' => 'numeric',
            'country' => 'sometimes|array',
            'country.*' => 'numeric',
            'state' => 'sometimes|array',
            'state.*' => 'numeric',
            'city' => 'sometimes|array',
            'city.*' => 'numeric',
            'profile_show' => 'sometimes|array',
            
        ];
    }
}
