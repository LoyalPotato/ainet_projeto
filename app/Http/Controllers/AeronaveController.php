<?php
namespace App\Http\Controllers;

use App\Aeronave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAeronave;
use App\AeronaveValor;
use App\Http\Requests\UpdateAeronaveRequest;
use App\User;


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
        $naves = Aeronave::paginate(5);
        $naves_valores = DB::table('aeronaves_valores')->get();
        return view('aeronaves.aeronaves', compact('naves', 'naves_valores'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $naves_valores = DB::table('aeronaves_valores')->get(); , 'naves_valores'
        return view('aeronaves.aeronaves_create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAeronave $request)
    {
        // NOTE: Tem (user) autorizacao para criar Definido no store aero
        $this->authorize('create', Aeronave::class);
        $validated = $request->validated();
        //NOTE: Splice para separar os valores dos dados da nave
        $naves_valores = array_splice($validated, 6, count($validated));
        Aeronave::create($validated);
        for ($i = 1; $i <= 10; $i++) {
            AeronaveValor::create([
                'matricula' => $validated['matricula'],
                'unidade_conta_horas' => $i, 'minutos' => $naves_valores['tempos'][$i - 1],
                'preco' => $naves_valores['precos'][$i - 1]
            ]);
        }

        return redirect('/aeronaves');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePiloto(StoreAeronave $request)
    {
        /* 
        NOTE:
        Check if piloto exists

        */

        return redirect('/aeronaves');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Aeronave  $aeronave
     * @return \Illuminate\Http\Response
     */
    public function show(Aeronave $aeronave)
    {
        $naves = array($aeronave);
        $naves_valores = $aeronave->valores;
        return view('aeronaves.aeronaves', compact('naves', 'naves_valores'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aeronave  $aeronave
     * @return JSON
     */
    public function showValores(Aeronave $aeronave)
    {
        $naves_valores = DB::table('aeronaves_valores')
            ->select('unidade_conta_horas')
            ->addSelect('minutos')
            ->addSelect('preco')
            ->where('matricula', '=', $aeronave->matricula)
            ->get();

        return response()->json($naves_valores);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Aeronave  $aeronave
     * @return \Illuminate\Http\Response
     */
    public function showPilotos(Aeronave $aeronave)
    {
        $this->authorize('view', $aeronave);
        $users_auto = $aeronave->pilotos()->paginate(5);
        //NOTE: Get all ids not in  ^ 
        dd($aeronave->pilotos);
        foreach ($users_auto as $piloto) {
            $ids_not_auto[] =  $piloto->id;
        }
        $users_not_auto = User::where('id', '!=', $ids_not_auto)->paginate(5);
        return view('aeronaves.aeronaves_pilotos', compact('aeronave', 'users_auto', 'users_not_auto'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aeronave  $aeronave
     * @return \Illuminate\Http\Response
     */
    public function edit(Aeronave $aeronave)
    {
        return view('aeronaves.aeronaves_edit', compact('aeronave'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aeronave  $aeronave
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAeronaveRequest $request, Aeronave $aeronave)
    {
        $this->authorize('update', $aeronave);
        $validated = $request->validated();
        $aeronave->updateNave($validated, $aeronave);
        return redirect('/aeronaves');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aeronave  $aeronave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aeronave $aeronave)
    {
        $this->authorize('delete', $aeronave);
        /* 
        As aeronaves são removidas com soft deletes se estiverem associados a algum movimento.
        Caso contrário, os registos deverão ser apagados da base de dados.
        Apaga uma aeronave. Apaga também o mapa que cruza as unidades do
        conta-horas com o tempo e preço. Se não for possível apagar a
        aeronave, faz um "softdelete" sem apagar o mapa
        */
        if ($aeronave->movimentos->isEmpty()) {
            $aeronave->forceDelete();
            $aeronave->valores()->delete();
        } else {
            $aeronave->delete();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aeronave  $aeronave
     * @param \App\User       $pilotoAuto
     * @return \Illuminate\Http\Response
     */
    public function destroyPiloto(User $pilotoAuto, Aeronave $aeronave)
    {
        $this->authorize('delete', $aeronave);
        // BUG: Removeu a aeronave da tabela pivot o.0
        // $aeronave->pilotos()->attach($pilotoAuto->id);
        return redirect()->back();
    }
}
