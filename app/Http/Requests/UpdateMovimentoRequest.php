<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovimentoRequest extends FormRequest
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

            /*'data' => ['required', 'date'],
            'hora_descolagem' => ['time'],
            'hora_aterragem' => ['time'],
            'aeronave' => ['required', 'max:40'],
            'num_diario' => ['required', 'max:40'],
            'num_servico' => ['required', 'max:40'],
            'piloto_id' => ['required', 'integer'],
            'natureza' => ['required', 'max:40'],
            'aerodromo_partida' => ['required', 'max:40'],
            'aerodromo_chegada' => ['required', 'max:40'],
            'num_aterragens' => ['required', 'max:40'],
            'num_descolagens' => ['required', 'min:1'],
            'num_pessoas' => ['required', 'min:1'],
            'conta_horas_inicio'=> ['required', 'min:1'],
            'conta_horas_fim'=> ['required', 'min:1'],*/


            "data" => "required|date",
            "hora_descolagem" => "date_format:H:i|required|before:hora_aterragem",
            "hora_aterragem" => "date_format:H:i|required",
            "aeronave" => "required|exists:aeronaves,matricula|min:1|max:8|regex:/^([A-Z]+\-[A-Z]+)$/",
            "num_diario" => "required|integer",
            "num_servico" => "required|integer",
            "piloto_id" => "required|integer|exists:users,id",
            "natureza" => "required|in:T,I,E",
            "aerodromo_partida" => "required|exists:aerodromos,code",
            "aerodromo_chegada" => "required|exists:aerodromos,code",
            "num_aterragens" => "required|integer|gte:0",
            "num_descolagens" => "required|integer|gte:0",
            "num_pessoas" => "required|integer|gt:0",
            "conta_horas_inicio" => "required|integer",
            "conta_horas_fim" => "required|integer",
            "modo_pagamento" => "required|in:T,M,N,P",
            "num_recibo" => "required|max:20",
            
        
        ];
    }
}
