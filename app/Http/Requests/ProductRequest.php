<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id', 
            'name' => 'required|max:255',
            'description' => 'nullable|string|max:255', 
            'price' => 'required|numeric|min:0',
            // 'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'product_code' => 'required|max:10|unique:products,product_code,' . $this->route('id'), 
            'quantity' => 'integer|min:0',
           
        ];
    }
    
    public function messages(): array
    {
        return [
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'name.required' => 'The product name field is required.',
            'name.max' => 'The product name may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
            // 'image.image' => 'The file must be an image.',
            // 'image.mimes' => 'The image must be a file of type: jpg, jpeg, png.',
            'product_code.required' => 'The product code field is required.',
            'product_code.max' => 'The product code may not be greater than 10 characters.',
            'product_code.unique' => 'The product code has already been taken.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 0.',
           
        ];
    }
}
    