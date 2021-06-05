<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddVariantRequest extends FormRequest
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
            'variant'=>'numeric',
        ];
    }
    public function messages()
    {
        return [
            'variant.numeric'=>'Giá sản phẩm phải là kiểu số!',
        ];
    }
}
