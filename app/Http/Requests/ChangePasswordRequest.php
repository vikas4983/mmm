<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => [
                'required',
                'string',
                'min:8',
                'different:current_password',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ],
            'password_confirmation' => ['required', 'same:new_password'],
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Current password is required.',
            'current_password.min' => 'Current password must be at least 8 characters.',
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least 8 characters.',
            'new_password.different' => 'New password must be different from the current password.',
            'new_password.regex' => 'New password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.',
            'password_confirmation.required' => 'Please confirm your new password.',
            'password_confirmation.same' => 'New password and confirmation do not match.',
        ];
    }


}
