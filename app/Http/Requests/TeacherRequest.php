<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:teachers',
            'subject_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'subject_id' => 'subject'
        ];
    }

//    public function messages()
//    {
//        return [
//            'name.required' => 'Name is invalid',
//        ];
//    }
}
