<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserSettingRequest extends FormRequest
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
    public function rules()
    {
        $rules = [];
        if ($this->has('name_privacy')) {
            $rules['name_privacy'] = ['required', 'integer'];
        }
        if ($this->has('image_privacy')) {
            $rules['image_privacy'] = ['required', 'integer'];
        }
        if ($this->has('horoscope_privacy')) {
            $rules['horoscope_privacy'] = ['required', 'integer'];
        }
        if ($this->has('mobile_number_privacy')) {
            $rules['mobile_number_privacy'] = ['required', 'integer'];
        }
        return $rules;
    }
}
