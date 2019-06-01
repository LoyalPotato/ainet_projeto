<?php

namespace App\Http\Controllers;

use App\Movimento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ativo');

    }
    public function index()
    {        
        $movimentos = Movimento::paginate(10);
        $pagetitle = "Movimentos";
        $db = DB::table('movimentos')->get();
        return view('movimentos.index', compact('movimentos', 'pagetitle', 'db'));
    }

    public function edit(Movimento $movimento)
    {
        $pagetitle = "Editar movimento";
        return view('movimentos.edit', compact('pagetitle'));
    }

    public function create()
    {
        
        $this->authorize('create', User::class);

        $movimento = new Movimento;
        $pagetitle = "Adicionar movimento";
        return view('movimentos.create', compact('movimento', 'pagetitle'));
    }

    public function show()
    {
        return view('movimentos.linegraph');
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

    public function destroy()
    {
        $this->authorize('delete', $movimento);
        $movimento->delete();

        return redirect()
            ->route('movimentos.index')
            ->with('success', 'Movimento apagado com sucesso!');

    }
}
