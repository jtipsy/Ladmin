<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BrandStoreRequest extends Request
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
            'name' => 'required|unique:stores,name,'.$this->id,
            'type' => 'required',
            'phone' => 'required',
			'address' =>  'required',
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
            'name' => trans('labels.store.name'),
            'type' => trans('labels.store.type'),
            'phone' => trans('labels.store.phone'),
            'address' => trans('labels.store.address'),
        ];
    }
}


