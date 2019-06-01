<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\CertLiceRule;

class StoreUserRequest extends FormRequest
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
            'num_socio' => 'required|max:4',
            'email' => 'required|email',
            'nome_informal' => 'required',
            'name' => 'required',
            'tipo_socio' => Rule::in(['P', 'NP', 'A']),
            'sexo' => 'required|between:0,1',
            'quota_paga' => 'required|between:0,1',
            'ativo' => 'required|between:0,1',
            'direcao' => 'required|between:0,1',
            'data_nascimento' => 'required|date',
            'nif' => 'required|min:8|max:10',
            'endereco' => 'required|alpha_dash',
            'telefone' => 'required|min:9|max:9',
        'file_foto' => 'required|image|max:2048',];
    }
}
