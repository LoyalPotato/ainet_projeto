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
        8 caracteres de A-Z e com números e hífens.  
        */
        return [
            'matricula' => ['required', 'unique:aeronaves', 'alpha_dash', 'max:8',],
            'marca' => ['required', 'max:40'],
            'modelo' => ['required', 'max:40'],
            'num_lugares' => ['required','min:1', 'integer'],
            'conta_horas' => ['required', 'min:1', 'integer'],
            'preco_hora' => ['required', 'min:1', 'numeric'],
            'tempos.*' => ['required', 'min:5', 'max:60', 'integer'], 
            'precos.*' => ['required', 'min:1', 'integer']
        ];
    }
    
    public function messages()
    {
        return[
            'matricula.max' => 'Matricula superior a 8 caracteres'
        ];
    }

}
