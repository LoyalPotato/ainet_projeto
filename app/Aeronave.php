<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->hasMany('App\AeronaveValor');
    }
}
