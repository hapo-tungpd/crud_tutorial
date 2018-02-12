<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequests extends FormRequest
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
            'name' => 'required|max:255|min:6',
            'age' => 'required|numeric|max:80|min10',
            'sex' => 'required',
            'phonenumber'=> 'max:11|min:10|numeric',
            'image' => 'image',
            'skill' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.max'    => 'Trường :attribute vượt quá 255 ký tự.',
            'name.min' => 'Trường :attribute tối thiểu 6 ký tự.',
            'phonenumber.max' =>'Trường :attribute không được quá 11 số.',
            'phonenumber.min'   => 'Trường :attribute tối thiểu 10 số.',
            'image' => 'Trường :attribute nhập không đúng định dạng ảnh(jpeg, png, bmp, gif, or svg).',
            'numeric' => 'Trường: attribute phải là số.',
        ];
    }

}
