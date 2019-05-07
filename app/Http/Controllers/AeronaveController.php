<?php

namespace App\Http\Controllers;

use App\Aeronave;
use Illuminate\Http\Request;

class AeronaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $naves = Aeronave::paginate(4);
        $pagetitle = 'Aeronaves';
        return view('aeronaves.aeronaves', compact('naves', 'pagetitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagetitle = 'Criar nova aeronave';
        return view('aeronaves.aeronaves_create', compact('pagetitle'));
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aeronave  $aeronave
     * @return \Illuminate\Http\Response
     */
    public function show(Aeronave $aeronave)
    {
        $pagetitle = "Aeronave $aeronave->matricula";
        $naves = array($aeronave );
        return view('aeronaves.aeronaves', compact('pagetitle', 'naves'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aeronave  $aeronave
     * @return \Illuminate\Http\Response
     */
    public function edit(Aeronave $aeronave)
    {
        $pagetitle = "Aeronave $aeronave->matricula";
        return view('aeronaves.aeronaves_edit', compact('pagetitle', 'aeronave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aeronave  $aeronave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aeronave $aeronave)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aeronave  $aeronave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aeronave $aeronave)
    {
        //
    }
}
