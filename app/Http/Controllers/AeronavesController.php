<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aeronave;

class AeronavesController extends Controller
{
    //

    public function index()
    {
        $naves = Aeronave::all();
        return view('aeronaves', compact('naves'));
    }
}
