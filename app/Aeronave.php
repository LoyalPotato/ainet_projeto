<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\UpdateAeronaveRequest;

class Aeronave extends Model
{
    use SoftDeletes;
    /* 
    matricula, marca, modelo, num_lugares,
conta_horas, preco_hora, tempos[], precos[ ]
    */
    protected $fillable = [
        'matricula', 'marca', 'modelo', 'num_lugares',
        'conta_horas', 'preco_hora',
    ];

    // Overrides primary key
    protected $primaryKey = 'matricula';

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

    public function updateNave($request, Aeronave $aeronave)
    {
        $naves_valores = array_splice($request, 6, count($request));
        $naves_valores['matricula'] =  $request['matricula'];
        foreach ($aeronave->valores as $valor) {
            $valor->matricula =  $request['matricula'];
            $valor->minutos =  $naves_valores['tempos'][$valor->unidade_conta_horas];
            $valor->preco = $naves_valores['precos'][$valor->unidade_conta_horas];
            $valor->save();
        }
        
        $aeronave->fill($request);
        $aeronave->save();
    }
}
