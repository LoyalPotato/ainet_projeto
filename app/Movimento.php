<?php

namespace App;
use App\User;
use App\Aerodromo;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
   
    protected $fillable = ['tipo_conflito','justificacao_conflito','data','hora_descolagem','hora_aterragem','aeronave','num_diario','num_servico','piloto_id',		
'num_licenca_piloto','validade_licenca_piloto','tipo_licenca_piloto','num_certificado_piloto',
'validade_certificado_piloto','classe_certificado_piloto','natureza','aerodromo_partida',				 'aerodromo_chegada','num_aterragens','num_descolagens','num_pessoas','conta_horas_inicio',	
'conta_horas_fim','tempo_voo','preco_voo','modo_pagamento','num_recibo','observacoes','confirmado',	
'tipo_instrucao','instrutor_id','num_licenca_instrutor','validade_licenca_instrutor',
'tipo_licenca_instrutor','num_certificado_instrutor','validade_certificado_instrutor',
'classe_certificado_instrutor','created_at','updated_at'
    ];


    public function aeronaves()
    {
        return $this->belongsTo('App\Aeronave','aeronave');
    }

    public function piloto() {
		return $this->hasOne('App\User', 'id', 'piloto_id');
	}
    public function aerodromoChegada() {
        return $this->hasOne('App\Aerodromo', 'code', 'aerodromo_chegada');
    }
    public function aerodromoPartida() {
        return $this->hasOne('App\Aerodromo', 'code', 'aerodromo_partida');
    }

	public function instrutor() {
		return $this->hasOne('App\User', 'id', 'instrutor_id');
	}

    // public static function filtrar(Request $request)
    // {
    //     $user= auth()->user();
        
    //     $movimentos=Movimento::where('id','<',100000000000000);
        

    //     $id = $request->input('id');
    //     $aeronave = $request->input('aeronave');
    //     $data_inf = $request->input('data_inf');
    //     $data_sup = $request->input('data_sup');
    //     $natureza = $request->input('natureza');
    //     $confirmado = $request->input('confirmado');
    //     $piloto = $request->input('piloto');
    //     $instrutor = $request->input('instrutor');
    //     $meus_movimentos = $request->input('meus_movimentos');
        

    //     if ($id) {
    //         $movimentos=$movimentos->where('id',$id);
    //     }
    //     if ($aeronave) {
    //         $movimentos=$movimentos->where('aeronave',$aeronave);
    //     }
    //     if ($data_inf) {
    //         $movimentos=$movimentos->where('data','<',$data_inf);
    //     }
    //     if ($data_sup) {
    //         $movimentos=$movimentos->where('data','>',$data_sup);
    //     }
    //     if ($natureza) {
    //         $movimentos=$movimentos->where('natureza',$natureza);
    //     }
    //     if ($confirmado=='0') {
    //         $movimentos=$movimentos->where('confirmado',$confirmado);
    //     }
    //     if ($piloto) {
    //         $movimentos=$movimentos->where('piloto_id',$piloto);
    //     }
    //     if ($instrutor) {
    //         $movimentos=$movimentos->where('instrutor_id',$instrutor);
    //     }
    //     if ($meus_movimentos) {
    //         $movimentos=$movimentos->where('piloto_id',$user->id)->orWhere('instrutor_id',$user->id);           

    //     }
    //     return $movimentos;
    // }
    

    
}
