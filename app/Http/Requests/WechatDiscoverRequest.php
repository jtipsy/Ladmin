<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WechatDiscoverRequest extends Request
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
            'content' => 'required|unique:stores,name,'.$this->id,
            'num' => 'required',
            'image' => 'required',
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
            'content' => trans('labels.store.name'),
            'num' => trans('labels.store.type'),
            'image' => trans('labels.store.type'),
        ];
    }
}


