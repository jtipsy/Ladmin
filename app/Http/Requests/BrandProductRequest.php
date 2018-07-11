<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BrandProductRequest extends Request
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
            'name' => 'required',
            'species' => 'required',
            'price' => 'required',
			'net_weight' =>  'required',
            'thumb' => 'required',
			'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
        ];
    }

    public function attributes()
    {
        return [
            'name' => trans('labels.brand_product.name'),
            'species' => trans('labels.brand_product.species'),
            'price' => trans('labels.brand_product.price'),
            'net_weight' => trans('labels.brand_product.net_weight'),
            'thumb' => trans('labels.brand_product.thumb'),
			'status'     => trans('labels.brand.status'),  
        ];
    }
}


