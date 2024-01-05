<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => 'required|current_password',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return ['current_password.current_password' => 'The current password field is not correct',];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validation(Request $request){
        return Validator::make($request->all(), $this->rules(), $this->messages());
    }
}
