<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aeronave extends Model
{
    use SoftDeletes;
    // Overrides primary key
    protected $primaryKey = 'matricula';
    public $incrementing = false;
    // Disables auto timestamps
    public $timestamps = false;
}