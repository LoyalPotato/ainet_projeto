<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimento;

class MovimentosController extends Controller
{
    public function index()
    {        
        //  $this->authorize('list', Movimento::class);
        $movimentos = Movimento::all();
        return view('movimentos.index', compact('movimentos'));
    }


     public function edit(Movimentos $movimento)
    {
        $this->authorize('update', $movimento);
        return view('movimentos.edit', compact('movimento'));
    }



    public function create()
    {
        $this->authorize('create',Movimento::class);
        $movimento = new Movimento;

        return view('movimentos.add', compact('movimento'));
    }


     public function store()
    {
    }


    public function update()
    {
    }


	public function estatistica()
    {
    }

}
