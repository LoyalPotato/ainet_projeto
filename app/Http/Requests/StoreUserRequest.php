<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                'nome_informal' => 'required|string',
                'name' => 'required|string',
                'tipo_socio' => Rule::in(['P', 'NP', 'A']),
                'sexo' => Rule::in(['M', 'F']),
                'quota_paga' => 'required|between:0,1',
                'ativo' => 'required|between:0,1',
                'direcao' => 'required|between:0,1',
                'data_nascimento' => 'required|date',
                'nif' => 'required|min:9|max:9',
                'endereco' => 'required|string',
                'telefone' => 'required|min:9|max:14',
                'file_foto' => 'required|image|max:2048',
                'aluno' => 'between:0,1',
                'instrutor' => 'between:0,1',
                'num_licenca' => 'alpha_dash',
                'tipo_licenca' => Rule::in(['CPL(A)', 'ATPL', 'ALUNO-PPL(A)', 'ALUNO-PU', 'PPL(A)', 'PU']),
                'validade_licenca' => '',
                'licenca_confirmada' => 'between:0,1',
                'num_certificado' => '',
                'classe_certificado' => Rule::in(['Class 1', 'Class 2', 'LAPL']),
                'validade_certificado' => '',
                'certificado_confirmado' => 'between:0,1',
            ];
    }

}
