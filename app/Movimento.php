<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
   
    protected $fillable = [
        'id', 'aeronave', 'data' , 'hora_descolagem', 'hora_aterragem',
        'tempo_voo', 'natureza', 'piloto_id', 'aerodromo_partida', 'aerodromo_chegada',
        'num_aterragens', 'num_descolagens', 'num_diario', 'num_servico', 'conta_horas_inicial',
        'conta_horas_final', 'num_pessoas', 'tipo_instrucao', 'instrutor_id', 'confirmado', 'observacoes',
    ];





}
