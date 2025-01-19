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
            'marital_status' => 'nullable|array',
            'marital_status.*' => 'integer',
            'religion' => 'nullable|array',
            'religion.*' => 'integer',
            'caste' => 'nullable|array',
            'caste.*' => 'integer',
            'country' => 'nullable|array',
            'country.*' => 'integer',
            'state' => 'nullable|array',
            'state.*' => 'integer',
            'city' => 'nullable|array',
            'city.*' => 'integer',
            'photo' => 'nullable|integer',
        ];
    }
}
