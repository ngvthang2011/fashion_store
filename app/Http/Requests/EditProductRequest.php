<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'product_code'=>'required|min:3',
            'product_name'=>'required|min:3',
            'product_price'=>'required|numeric',
            'product_img'=>'image',
        ];
    }

    public function messages()
    {
        return [
            'product_code.required'=>'Mã sản phẩm không được để trống!',
            'product_code.min'=>'Mã sản phẩm phải lớn hơn 3 ký tự!',
            'product_name.required'=>'Tên sản phẩm không được để trống!',
            'product_name.min'=>'Tên sản phẩm phải lớn hơn 3 ký tự!',
            'product_price.required'=>'Giá sản phẩm không được để trống!',
            'product_price.numeric'=>'Giá sản phẩm không đúng định dạng!',
            'product_img.image'=>'File không đúng định dạng!',
        ];
    }
}
