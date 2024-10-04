<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberCreateRequest extends FormRequest
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
            'email' => 'required|string|email|max:50|unique:users,email',
            'mobile' => 'required|string|max:30|unique:users,mobile|regex:/^[0-9]+$/',
            'profile_created_by' => 'required|string|max:30',
            'gender' => 'required|in:1,0',
            'first_name' => 'required|string|max:15|regex:/^[a-zA-Z]+$/', // Only letters
            'last_name' => 'required|string|max:15|regex:/^[a-zA-Z]+$/', // Only letters
            'date_of_birth' => 'required|date', // Ensure it's a valid date
            'religion' => 'required|string|max:30|regex:/^[a-zA-Z]+$/', // Only letters
            'mother_tongue' => 'required|string|max:30|regex:/^[a-zA-Z]+$/', // Only letters
            'country' => 'required|string|max:30|regex:/^[a-zA-Z]+$/', // Only letters
        ];
    }
    public function messages(): array
{
    return [
        'email.required' => 'The email address is required.',
        'email.email' => 'The email address must be a valid email format.',
        'email.unique' => 'This email address is already registered.',
        'mobile.required' => 'The mobile number is required.',
        'mobile.unique' => 'This mobile number is already registered.',
        'mobile.regex' => 'The mobile number must contain only numbers.',
        'first_name.required' => 'The first name is required.',
        'first_name.regex' => 'The first name should only contain letters.',
        'last_name.required' => 'The last name is required.',
        'last_name.regex' => 'The last name should only contain letters.',
        'religion.required' => 'The religion is required.',
        'religion.regex' => 'Religion should only contain letters.',
        'mother_tongue.required' => 'The mother tongue is required.',
        'mother_tongue.regex' => 'Mother tongue should only contain letters.',
        'country.required' => 'The country is required.',
        'country.regex' => 'Country should only contain letters.',
        'date_of_birth.required' => 'The date of birth is required.',
        'date_of_birth.date' => 'The date of birth must be a valid date.',
        'gender.required' => 'The gender is required.',
        'gender.in' => 'Gender must be either 1 (male) or 0 (female).',
    ];
}
}
