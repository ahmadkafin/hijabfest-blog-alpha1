<?php

namespace App\Http\Requests;

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
            'products_name'             => 'required',
            'products_slugs'            => 'unique:tbl_products,products_slugs',
            // 'products_weight'           => 'required|digits',
            // 'products_dimension_width'  => 'required|digits',
            // 'products_dimension_height' => 'required|digits',
            // 'products_dimension_wide'   => 'required|digits',
            // 'products_qty'              => 'required|digits',
            // 'products_price'            => 'required|digits'
        ];
    }
}
