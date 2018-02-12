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
            'name' => 'required|max:255|min:6',
            'age' => 'required|numeric|max:80|min:10',
            'sex' => 'required',
            'phonenumber'=> 'required',
            'email'=>'required|unique:employees|email',
            'image' => 'nullable|image',
            'skill' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường :attribute bắt buộc nhập.',
            'unique' => 'Trường :attribute không được trùng.',
            'name.max'    => 'Trường :attribute vượt quá 255 ký tự.',
            'name.min' => 'Trường :attribute tối thiểu 6 ký tự.',
            'image.image' => 'Trường :attribute không phải là ảnh',
            'numeric' => 'Trường: attribute phải là số.',
            'age.max' => 'Hãy nhập đúng số tuổi!',
            'age.min' => 'Hãy nhập đúng số tuổi!',
            'skill.nullable' => 'dfdfffđfd',
        ];
    }
}
