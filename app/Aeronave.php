<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeronave extends Model
{
    // Overrides primary key
    protected $primaryKey = 'matricula';

    public $incrementing = false;
    // Disables auto timestamps
    public $timestamps = false;
}
