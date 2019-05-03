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
        $pagetitle = 'Aeronaves';
        return view('aeronaves', compact('naves', 'pagetitle'));
    }
}
