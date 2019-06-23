<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aerodromo extends Model
{
    use SoftDeletes;
    /**
     *
     * @var array
     */
    protected $primaryKey = 'code';

    protected $fillable = ['code','nome','militar','ultraleve','deleted_at'];

    protected $table = 'aerodromos';

    public $incrementing = false;
    
    public $timestamps = false;



    

    

}
