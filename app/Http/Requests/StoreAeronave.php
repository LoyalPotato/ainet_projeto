<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAeronave extends FormRequest
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
        /* 
        matricula, marca, modelo, num_lugares,
        conta_horas, preco_hora, tempos[], precos[ ]
        */
        return [
            'matricula' => ['required', 'unique:aeronaves'],
            'marca' => 'required',
            'modelo' => 'required',
            'num_lugares' => 'required',
            'conta_horas' => 'required',
            'preco_hora' => 'required',
            'tempos' => 'required',
            'precos' => 'required',
        ];
    }

}
