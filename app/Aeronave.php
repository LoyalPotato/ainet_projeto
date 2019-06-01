<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aeronave extends Model
{
    use SoftDeletes;
   
    protected $fillable = [
        'matricula', 'marca', 'modelo', 'num_lugares',
        'conta_horas', 'preco_hora',
    ];

    // Overrides primary key
    protected $primaryKey = 'matricula';

    protected $table = 'aeronaves';


    public $incrementing = false;
    // Disables auto timestamps

    public function valores()
    {
        return $this->hasMany('App\AeronaveValor', 'matricula');
    }

    public function movimentos()
    {
        return $this->hasMany('App\Movimento', 'aeronave', 'matricula');
    }

    public function pilotos()
    {
        return $this->belongsToMany('App\User','aeronaves_pilotos', 'matricula', 'piloto_id');
    }

    public function updateNave($request)
    {
        $naves_valores = array_splice($request, -2, count($request));
        $this->fill($request);
        $this->save();
        foreach ($this->valores as $valor) {
            $valor->fill([
            'minutos'=> $naves_valores['tempos'][$valor->unidade_conta_horas - 1],
           'preco' => $naves_valores['precos'][$valor->unidade_conta_horas - 1]
            ]);
            $valor->save();
        }

    }
}
