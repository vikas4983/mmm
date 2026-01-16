<?php

namespace App\Http\Requests\searches;

use Illuminate\Foundation\Http\FormRequest;

class AdvanceFilterRequest extends FormRequest
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
            'min_age' => 'required|integer',
            'max_age' => 'required|integer',
            'min_height' => 'required|integer',
            'max_height' => 'required|integer',
            'religion' => 'sometimes|array',
            'religion.*' => 'numeric',
            'caste' => 'sometimes|array',
            'caste.*' => 'numeric',
            'marital_status' => 'sometimes|array',
            'marital_status.*' => 'numeric',
            'children' => 'sometimes|array',
            'children.*' => 'numeric',
            'mother_tongue' => 'sometimes|array',
            'mother_tongue.*' => 'numeric',
            'country' => 'sometimes|array',
            'country.*' => 'numeric',
            'state' => 'sometimes|array',
            'state.*' => 'numeric',
            'city' => 'sometimes|array',
            'city.*' => 'numeric',
            'income' => 'sometimes|array',
            'income.*' => 'numeric',
            'education' => 'sometimes|array',
            'education.*' => 'numeric',
            'occupation' => 'sometimes|array',
            'occupation.*' => 'numeric',
            'profile_show' => 'sometimes|array',
            'horoscope' => 'sometimes|array',
            'manglik' => 'sometimes|array',
            'family_status' => 'sometimes|array',
            'family_status.*' => 'numeric',
            'physical_status' => 'sometimes|array',
            'physical_status.*' => 'numeric',
            'diet' => 'sometimes|array',
            'diet.*' => 'numeric',
            'drink' => 'sometimes|array',
            'drink.*' => 'numeric',
            'smoke' => 'sometimes|array',
            'smoke.*' => 'numeric',
            'hiv' => 'sometimes|array',
            'hiv.*' => 'numeric',
        ];
    }
}
