<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    

    public function aeronaves()
    {
        return $this->belongsTo('App\Aeronave','aeronave');
    }
}
