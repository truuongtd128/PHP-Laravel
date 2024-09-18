<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:8',
            'type' => 'required|string|in:admin,member',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name cannot be empty',
            'name.max' => 'Name cannot exceed 255 characters',
            'email.required' => 'Email cannot be empty',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email cannot exceed 255 characters',
            // 'email.unique' => 'Email has already been taken',
            'password.required' => 'Password cannot be empty',
            'password.min' => 'Password must be at least 8 characters',
            'type.required' => 'User type cannot be empty',
            'type.in' => 'User type must be either admin or member',
        ];
    }
}
