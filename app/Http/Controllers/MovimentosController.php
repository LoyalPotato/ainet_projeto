<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimento;
use App\User;
use App\Aeronave;
use App\Http\Requests\UpdateMovimentoRequest;
use App\Http\Requests\StoreMovimento;
use App\Aerodromo;

class MovimentosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ativo');

    }
    public function index(Request $request)
    {        
         $this->authorize('listar', Movimento::class);
        
        $user= auth()->user();

        $movimentos=Movimento::where('id','<',100000000000000);
        $aeronaves=Aeronave::all();

        $id = $request->input('id');
        $aeronave = $request->input('aeronave');
        $data_inf = $request->input('data_inf');
        $data_sup = $request->input('data_sup');
        $natureza = $request->input('natureza');
        $confirmado = $request->input('confirmado');
        $piloto = $request->input('piloto');
        $instrutor = $request->input('instrutor');
        $meus_movimentos = $request->input('meus_movimentos');
        $dataInf = date("Y-m-d", strtotime($data_inf));
        $dataSup = date("Y-m-d", strtotime($data_sup));
        if ($id) {
            $movimentos=$movimentos->where('id',$id);
        }
        if ($aeronave) {
            $movimentos=$movimentos->where('aeronave',$aeronave);
        }
        
        
        if ($data_inf!=null) {
            $movimentos=$movimentos->where('data','>=',$dataInf);
        }
        if ($data_sup!=null) {

            $movimentos=$movimentos->where('data','<=',$dataSup);
        }
    
        if ($natureza) {
            $movimentos=$movimentos->where('natureza',$natureza);
        }
        if ($confirmado=='0') {
            $movimentos=$movimentos->where('confirmado',$confirmado);
        }
        if ($confirmado=='1') {
            $movimentos=$movimentos->where('confirmado',$confirmado);
        }
        if ($piloto) {
            $movimentos=$movimentos->where('piloto_id',$piloto);
        }
        if ($instrutor) {
            $movimentos=$movimentos->where('instrutor_id',$instrutor);
        }
        if ($meus_movimentos) {
            $movimentos=$movimentos->where('piloto_id',$user->id)->orWhere('instrutor_id',$user->id);           

        }

        $movimentos = $movimentos->paginate(15);
        $users = User::all();
        

        return view('movimentos.index', compact('movimentos','aeronaves','users'));
    }
            

    public function edit(Movimento $movimento)
    {
        $this->authorize('update',$movimento);
        $aeronaves = Aeronave::all();
        $aerodromos = Aerodromo::all();

        //dd($aeronaves);
        return view('movimentos.edit', compact('movimento','aeronaves','aerodromos'));
        }
        
        

    public function create()
    {
        
        $this->authorize('create', Movimento::class);
        $movimento = new Movimento;
        $aeronaves = Aeronave::all();
        $aerodromos = Aerodromo::all();
        return view('movimentos.add', compact('movimento','aeronaves','aerodromos'));
    }


   


    //StoreMovimento
    public function store(StoreMovimento $request, Movimento $movimento)
    {

        $this->authorize('create', Movimento::class);

        $user= auth()->user();

        if (($request->piloto_id != $user->id) || ($request->instrutor_id != $user->id)) {
           $request->validate([
            "piloto_id" => "required",
         ]);
        }

        if ($request['natureza'] == 'I') {
            $request->validate([
            "tipo_instrucao" => "required|in:D,S",
            "instrutor_id" =>"required|intege",

        ]);
        }

        $difContaHoras = ($request->conta_horas_fim - $request->conta_horas_inicio);

        
        $aeronave = Aeronave::find($request->aeronave);

        $preco_hora = $aeronave->preco_hora;
        
        $tempo_voo = $difContaHoras/10;

        $preco_voo = $tempo_voo*$preco_hora;







           $conflito = false;
       
        
        $linha = Aeronave::where('matricula', '=', $request->aeronave)->orderBy('conta_horas', 'desc')->value('conta_horas');
        

        if($request->conta_horas_inicio > $linha) {
            $conflito = true;
            Session::flash('alert-danger', 'danger');
        } elseif($request->conta_horas_inicio < $linha){
            $conflito = true;
            Session::flash('alert-warning', 'warning');
        }
        if($conflito){
            $request->validate([
                "tipo_conflito" => "required|in:S,B",
                "justificacao_conflito" => "required",
                ]);
        }

        $movimento = new Movimento();
        $movimento->fill($request->all());



        $movimento->hora_descolagem = date("Y-m-d h:i", strtotime($request->data . " "  . $request->hora_descolagem));
        $movimento->data = date("Y-m-d", strtotime($request->data));
        $movimento->hora_aterragem = date("Y-m-d h:i", strtotime($request->data . " "  . $request->hora_aterragem));
        $movimento->aeronave = $aeronave->matricula;
        $movimento->tempo_voo = $tempo_voo;
        $movimento->preco_voo = $preco_voo;



     

        //dd($movimento);

        $piloto = User::findOrFail($request->piloto_id);
        $movimento->num_licenca_piloto = $piloto->num_licenca;
        $movimento->tipo_licenca_piloto = $piloto->tipo_licenca;    
            $movimento->validade_licenca_piloto = $piloto->validade_licenca;
            
            $movimento->num_certificado_piloto = $piloto->num_certificado;
            
            $movimento->classe_certificado_piloto = $piloto->classe_certificado;
            
            $movimento->validade_certificado_piloto = $piloto->validade_certificado;
        


        if($movimento->natureza == "I"){
            
            
            
            $instrutor = User::findOrFail($request->instrutor_id);

            
            
            

            
            $movimento->num_licenca_instrutor = $instrutor->num_licenca;
            
            $movimento->tipo_licenca_instrutor = $instrutor->tipo_licenca;
            
            $movimento->validade_licenca_instrutor = $instrutor->validade_licenca;
            
            $movimento->num_certificado_instrutor = $instrutor->num_certificado;
            
            $movimento->classe_certificado_instrutor = $instrutor->classe_certificado;
            
            $movimento->validade_certificado_instrutor = $instrutor->validade_certificado;
    }



        $movimento->confirmado = 0;

        $movimento->save();

        return redirect()->route('movimentos.index');
    }


    public function update(UpdateMovimentoRequest $request, Movimento $movimento)
    {
        $this->authorize('storeupdate', $movimento);



        $piloto = User::findOrFail($movimento->piloto_id);



        if ($request->natureza == 'I') {
            $request->validate([
            "tipo_instrucao" => "required|in:D,S",
            "instrutor_id" =>"required|intege",

        ]);
    }



        


        $movimento->fill($request->all());
        $movimento->hora_aterragem = date("Y-m-d h:i", strtotime($request->data . " "  . $request->hora_aterragem));
        $movimento->hora_descolagem = date("Y-m-d h:i", strtotime($request->data . " "  . $request->hora_descolagem));
        $movimento->save();
        return redirect()->route('movimentos.index');
         
    }

    public function destroy(Movimento $movimento)
    {
        $this->authorize('delete', $movimento);
        
        $movimento->delete();
        return redirect()->route('movimentos.index');
    }

    public function confirmar(Movimento $movimento)
    {
        Movimento::where('id',$movimento->id)->update(['confirmado' => '1']);

        return redirect()
           ->route('movimentos.index')
           ->with('success', 'Movimento confirmado com sucesso!');
    }

	public function estatistica()
    {
    }

}
