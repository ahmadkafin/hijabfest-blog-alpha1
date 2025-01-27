<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'products_name'             => 'bail|required',
            'products_slugs'            => 'bail|unique:tbl_products,products_slugs',
            'file-1'                    => 'bail|file|image|mimes:jpeg,png,jpg|max:1024',
            'file-2'                    => 'bail|file|image|mimes:jpeg,png,jpg|max:1024',
            'file-3'                    => 'bail|file|image|mimes:jpeg,png,jpg|max:1024',
            'file-4'                    => 'bail|file|image|mimes:jpeg,png,jpg|max:1024',
            'file-5'                    => 'bail|file|image|mimes:jpeg,png,jpg|max:1024',
            'products_weight'           => 'bail|required|numeric',
            'products_dimension_width'  => 'bail|required|numeric',
            'products_dimension_height' => 'bail|required|numeric',
            'products_dimension_wide'   => 'bail|required|numeric',
            'products_qty'              => 'bail|required|numeric',
            'products_price'            => 'bail|required|numeric'
        ];
    }
}
