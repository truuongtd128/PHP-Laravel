<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'recipient_name' => 'required|max:255',
            'recipient_email' => 'required|email|max:255',
            'recipient_phone' => 'required|max:15',
            'recipient_address' => 'required|string|max:255',
        ];

        
    }

    public function messages(): array
    {
        return [
            'recipient_name.required' => 'The recipient name field is required.',
            'recipient_name.max' => 'The recipient name may not be greater than 255 characters.',
            
            'recipient_email.required' => 'The recipient email field is required.',
            'recipient_email.email' => 'The recipient email must be a valid email address.',
            'recipient_email.max' => 'The recipient email may not be greater than 255 characters.',
            
            'recipient_phone.required' => 'The recipient phone field is required.',
            'recipient_phone.max' => 'The recipient phone may not be greater than 15 characters.',
            
            'recipient_address.required' => 'The recipient address field is required.',
            'recipient_address.string' => 'The recipient address must be a string.',
            'recipient_address.max' => 'The recipient address may not be greater than 255 characters.',
           
        ];
    }
}
