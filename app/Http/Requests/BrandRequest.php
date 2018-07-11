<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BrandRequest extends Request
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
			'logo' => 'required',
            'name' => 'required|unique:brands,name,'.$this->id,
            'admin_name' => 'required|unique:brands,admin_name,'.$this->id,
            'describe' => 'required',
			'enterprise' =>  'required',
            'address' => 'required',
			'phone' => 'required|unique:brands,phone,'.$this->id,
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
			'logo' => trans('labels.brand.logo'),
            'name' => trans('labels.brand.name'),
            'admin_name' => trans('labels.brand.admin'),
            'describe' => trans('labels.brand.describe'),
            'enterprise' => trans('labels.brand.enterprise'),
            'address' => trans('labels.brand.address'),
            'phone' => trans('labels.brand.phone'),
			'status'     => trans('labels.brand.status'),  
        ];
    }
}


