<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AeronaveValor extends Model
{

    //
    protected $fillable = [
        'minutos', 'preco', 'matricula', 'unidade_conta_horas'
    ];
    protected $table = 'aeronaves_valores';

    public $timestamps = false;


    public function aeronaves()
    {
        return $this->belongsTo('App\Aeronave','matricula');
    }
}
