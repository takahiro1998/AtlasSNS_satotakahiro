<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterForm extends FormRequest
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
        'username'=>'required|min:2|max:12',
        'mail'=>'required|string|email|min:5|max:40',
        'password'=>'required|alpha_num|min:8|max:20',
        'password_confirmation'=>'required|alpha_num|min:8|max:20|confirmed'
        ];
    }
}
