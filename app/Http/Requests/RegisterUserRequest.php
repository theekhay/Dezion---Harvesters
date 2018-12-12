<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return true; //use spatie to ensure this user is an admin

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
    }


    /**
    * Custom message for validation
    *
    * @return array
    */
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'email.email' => "Invalid email format. Kindly provide a valid email",
            'password.required' => 'Password is required!'
        ];
    }
}
