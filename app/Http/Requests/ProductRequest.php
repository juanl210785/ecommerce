<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        $product = $this->route()->parameter('product');
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:products',
            'category_id' =>'required',
            'status' => 'required|in:1,2',
            'file' => 'required|array',
            'file.*' => 'required|image|mimes:jpeg,jpg,png|max:3000',
        ];

        if (isset($product)) {
            $rules['slug'] = 'required|unique:products,slug,'.$product->id;
            if (count($product->productimages) > 0) {
                $rules['file'] = 'array';
                $rules['file.*'] = 'image|mimes:jpeg,jpg,png|max:3000';
            }
            
        }

        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'marca' => 'required',
                'modelo' => 'required',
                'stock' => 'required|integer|min:1',
                'price' => 'required|numeric'
            ]);
        }
        return $rules;
    }
}
