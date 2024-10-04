<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminMenuRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:admin_menus,id',
            'url' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'count' => 'nullable|string|max:255',
            'model_name' => 'nullable|string|max:255',
            'status' => 'required|in:0,1',
        ];
    }
}
