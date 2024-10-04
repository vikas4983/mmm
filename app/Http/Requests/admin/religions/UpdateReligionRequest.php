<?php

namespace App\Http\Requests\admin\religions;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReligionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'religion' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ];
    }
}
