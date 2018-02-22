<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequests extends FormRequest
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
}
