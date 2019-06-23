<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                'num_socio' => ['required', 'integer'],
                'email' => ['required', 'email'],
                'classe_socio' => [Rule::in('N', 'C', 'M', 'H', ""), 'nullable'],
                'nome_informal' => ['required', 'alpha_num'],
                'name' => ['required','alpha'],
                'tipo_socio' => ['required', Rule::in(['P', 'NP', 'A'])],
                'sexo' => ['required', Rule::in(['M', 'F'])], 
                'quota_paga' => ['required', 'between:0,1'],
                'ativo' => ['required', 'between:0,1'],
                'direcao' => ['required', 'between:0,1'],
                'data_nascimento' => ['date'],
                'nif' => ['required', 'min:9', 'max:9'],
                'endereco' => ['required', 'alpha'],
                'telefone' => ['required', 'min:9', 'max:20'], 
                'file_foto' => [ 'image', 'max:2048'],
                'aluno' => ['between:0,1'],
                'instrutor' => ['between:0,1'],
                'num_licenca' => ['alpha_dash'],
                'tipo_licenca' => [Rule::in(['CPL(A)', 'ATPL', 'ALUNO-PPL(A)', 'ALUNO-PU', 'PPL(A)', 'PU'])],
                'validade_licenca' => [''],
                'licenca_confirmada' => ['between:0,1'], 
                'num_certificado' => [''],
                'classe_certificado' => [Rule::in(['Class 1', 'Class 2', 'LAPL'])],
                'validade_certificado' => [''], 
                'certificado_confirmado' => ['between:0,1'],
            ];
    }


}
