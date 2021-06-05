<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAttributeRequest extends FormRequest
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
            'attribute'=>'required|unique:attribute,name,'.$this->id.',id',
        ];
    }

    public function messages()
    {
        return [
            'attribute.required'=>'Tên thuộc tính không được để trống!',
            'attribute.unique'=>'Tên thuộc tính đã tồn tại!',
        ];
    }
}
