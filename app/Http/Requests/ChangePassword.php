<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\SameOldPasswd;

class ChangePassword extends FormRequest
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
            'old_password' => ['required', new SameOldPasswd],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'old_password.required'=>'Falta preencher: Password Anterior',
            'password.required'=>'Falta preencher: Password',
            'password.min' => 'Nova password tem que ser maior que 8 caracteres',
            'password.confirmed' => 'Password nao é igual à confirmada',
            'password_confirmation.required' => 'Falta preencher: Password Confirmation'
        ];
    }
}
