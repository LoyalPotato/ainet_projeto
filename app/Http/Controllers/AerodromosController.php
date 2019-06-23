<?php

namespace App\Http\Controllers;

use App\Aerodromo;
use Illuminate\Http\Request;

class AerodromosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aerodromos = Aerodromo::paginate(4);
        // dd($aerodromos);
        return view('aerodromos.listar', compact('aerodromos'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aerodromo  $aerodromos
     * @return \Illuminate\Http\Response
     */
    public function edit(Aerodromo $aerodromo)
    {   
        // dd($aerodromos);
        return  view('aerodromos.edit', compact('aerodromo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aerodromo  $aerodromos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aerodromo $aerodromo)
    {
        /* 
        code	varchar(20)	
        nome	varchar(255)	
        militar	varchar(255) [0]	sempre 0 
        ultraleve	varchar(255) [0]	sempre 0 
        deleted_at	timestamp NULL	
        */ 
        $aerodromo->nome = $request['nome'];
        $aerodromo->militar = "0";
        $aerodromo->ultraleve = "0";
        $aerodromo->save();

        return redirect()->back();
    }


   
}
