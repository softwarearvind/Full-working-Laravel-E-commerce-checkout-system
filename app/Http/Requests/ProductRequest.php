<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
             'name'       => 'required|string|max:255',
            'category'    => 'required',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'brand_id'      => 'required',
            'status'      => 'required',
            'image'       => 'required|image',
            'description' => 'required',
        ];
    }

       public function messages(): array
    {
        return [

            'name.required'        => 'Product name is required',
            'category.required'    => 'Please select category',
            'price.required'       => 'Price field is required',
            'quantity.required'    => 'Quantity field is required',
            'brand_id.required'      => 'brands field is required',
            'image.required'       => 'Please upload image',
            'image.image'          => 'File must be an image',
            'description.required' =>  'description field is required',

        ];
    }
}
