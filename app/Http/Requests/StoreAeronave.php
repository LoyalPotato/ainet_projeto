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
            'tempos' => ['required', 'min:5', 'max:60'], //NOTE: Como teste se isto está a funcionar
            'precos' => ['required', 'min:1'],
        ];
    }

}
