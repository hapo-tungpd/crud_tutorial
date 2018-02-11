<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequests extends FormRequest
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
            'name' => 'required|max:255|min:6|regex: /^[\p{L}\s\'.-]+$/',
            'age' => 'required',
            'sex' => 'required',
            'phonenumber'=> 'max:11|min:10',
            'email'=>'required|unique:employees|email|unique:employees',
            'image' => 'image',
            'skill' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường :attribute bắt buộc nhập.',
            'regex' => 'Trường :attribute không được có số và ký tự đặc biệt.',
            'unique' => 'Trường :attribute không được trùng.',
            'max'    => 'Trường :attribute vượt quá 255 ký tự.',
            'name.min' => 'Trường :attribute tối thiểu 6 ký tự.',
            'phonenumber.max' =>'Trường :attribute không được quá 11 số.',
            'phonenumber.min'   => 'Trường :attribute tối thiểu 10 số',
            'image' => 'Trường :attribute nhập không đúng định dạng ảnh(jpeg, png, bmp, gif, or svg).',
        ];
    }
}
