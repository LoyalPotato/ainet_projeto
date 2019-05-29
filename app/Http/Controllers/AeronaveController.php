<?php
namespace App\Http\Controllers;

use App\Aeronave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAeronave;
use App\AeronaveValor;
use App\Http\Requests\UpdateAeronaveRequest;

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
        $pagetitle = 'Aeronaves';
        $naves_valores = DB::table('aeronaves_valores')->get();
        return view('aeronaves.aeronaves', compact('naves', 'pagetitle', 'naves_valores'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagetitle = 'Criar nova aeronave';
        // $naves_valores = DB::table('aeronaves_valores')->get(); , 'naves_valores'
        return view('aeronaves.aeronaves_create', compact('pagetitle'));
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
     * Display the specified resource.
     *
     * @param  \App\Aeronave  $aeronave
     * @return \Illuminate\Http\Response
     */
    public function show(Aeronave $aeronave)
    {
        $pagetitle = "Aeronave $aeronave->matricula";
        $naves = array($aeronave);
        $naves_valores = $aeronave->valores;
        return view('aeronaves.aeronaves', compact('pagetitle', 'naves', 'naves_valores'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aeronave  $aeronave
     * @return JSON
     */
    public function showValores(Aeronave $aeronave)
    {
        $pagetitle = "Aeronave $aeronave->matricula";
        $naves_valores = DB::table('aeronaves_valores')
            ->select('unidade_conta_horas')
            ->addSelect('minutos')
            ->addSelect('preco')
            ->where('matricula', '=', $aeronave->matricula)
            ->get();

        return response()->json($naves_valores);
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
}
