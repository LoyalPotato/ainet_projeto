<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimento;
use App\User;

class MovimentosController extends Controller
{
    public function index(Request $request)
    {        
         //$this->authorize('list', Movimento::class);
        
        $user= auth()->user();
        $autorizacao='2';
        $movimentos=Movimento::where('id','<',1000);


        $id = $request->input('id');
        $aeronave = $request->input('aeronave');
        $data_inf = $request->input('data_inf');
        $data_sup = $request->input('data_sup');
        $natureza = $request->input('natureza');
        $confirmado = $request->input('confirmado');
        $piloto = $request->input('piloto');
        $instrutor = $request->input('instrutor');
        $meus_movimentos = $request->input('meus_movimentos');
        

        if ($id) {
            $movimentos=$movimentos->where('id',$id);
        }
        if ($aeronave) {
            $movimentos=$movimentos->where('aeronave',$aeronave);
        }
        if ($data_inf) {
            $movimentos=$movimentos->where('data','<',$data_inf);
        }
        if ($data_sup) {
            $movimentos=$movimentos->where('data','>',$data_sup);
        }
        if ($natureza) {
            $movimentos=$movimentos->where('natureza',$natureza);
        }
        if ($confirmado) {
            $movimentos=$movimentos->where('confirmado',$confirmado);
        }
        if ($piloto) {
            $movimentos=$movimentos->where('piloto_id',$piloto);
        }
        if ($instrutor) {
            $movimentos=$movimentos->where('instrutor_id',$instrutor);
        }
        if ($meus_movimentos) {
            $movimentos=$movimentos->where('meus_movimentos',$meus_movimentos);
        }

        $movimentos = $movimentos->paginate(15);
        
        $arrayInstrutores = array();
        $arrayPilotos = array();

        foreach ($movimentos as $movimento) {
            
            $id_instrutor = $movimento->instrutor_id;
            $id_piloto = $movimento->piloto_id;

            $instrutor = User::where('id',$id_instrutor);
            $piloto = User::where('id',$id_piloto);

            array_push($arrayInstrutores, $instrutor);
            array_push($arrayPilotos, $piloto);
        }
        
        
        return view('movimentos.index', compact('movimentos','autorizacao','arrayInstrutores','arrayPilotos'));
    }


    public function edit(Movimentos $movimento)
    {
        //$this->authorize('update', $movimento);
        return view('movimentos.edit', compact('movimento'));
    }



    public function create()
    {
        //$this->authorize('create',Movimento::class);
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
