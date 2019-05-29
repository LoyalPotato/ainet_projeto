<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'num_socio' => 'required|max:4|confirmed',
            'email' => 'required|email',
            'nome_informal' => 'required|alpha_dash',
            'name' => 'required|alpha_dash',
            'tipo_socio' => 'required|between:0,2',
            'sexo' => 'required|between:0,1',
            'quota_paga' => 'required|between:0,1',
            'ativo' => 'required|between:0,1',
            'direcao' => 'required|between:0,1',
            'data_nascimento' => 'required|date',
            'nif' => 'required|min:10|max:10|confirmed',
            'endereco' => 'required|alpha_dash',
            'telefone' => 'required|min:9|max:9|confirmed',
            'foto_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
