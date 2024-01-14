<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:users',
            'fullName' => ['required', 'valid_full_name'],
            'email' => 'required|email|unique:users',
            'phoneNumber' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return ['fullName.valid_full_name' => 'The full name field is not contain special characters.',];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validation(Request $request){
        return Validator::make($request->all(), $this->rules(), $this->messages());
    }
}
