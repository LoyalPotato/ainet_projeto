<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SocioCriado;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ativo');
    }

    public function index()
    {
        $user = Auth::user();
        $pagetitle = "Sócios";
        return view('socios.index', compact('user', 'pagetitle'));
    }


    public function showFichas(Request $request)
    {
        // NOTE: Nao funciona com o paginate
        $users = User::filter($request);
        // dd($users);
        // NOTE: paginate 
        $users = $users->paginate(20);
        // $users = User::paginate(10);
        return view('socios.fichas', compact('users'));
    }

    public function showFichasDirecao(User $user)
    {
        $users = User::paginate(10);
        return view('socios.fichas_direcao', compact('users'));
    }

    public function showQuotas(User $user)
    {
        $users = User::paginate(10);
        return view('socios.quotas', compact('users'));
    }

    public function showAtivarDesativar(User $user)
    {
        $users = User::paginate(5);
        return view('socios.ativar', compact('users'));
    }


    public function showLicenca(User $piloto)
    {
        $this->authorize('viewCertLice', $piloto);
        $path = 'docs_piloto/licenca_' . $piloto->id . '.pdf';

        if (!Storage::exists($path)) {
            return abort(404, 'Ficheiro não existe');
    }


        return Storage::response($path);
    }

    public function showCertificado(User $piloto)
    {
        $this->authorize('viewCertLice', $piloto);
        $path = 'docs_piloto/licenca_' . $piloto->id . '.pdf';

        if (!Storage::exists($path)) {
            return abort(404, 'Ficheiro não existe');
        }

        return Storage::response($path);
    }

    public function create()
    {
        $this->authorize('create', User::class);

        $user = new User;
        $pagetitle = "Adicionar um sócio";
        return view('socios.create', compact('user', 'pagetitle'));
    }

    public function store(StoreUserRequest $request)
    {

        // TODO: class_socio 2019-06-24
        $this->authorize('create', User::class);
        $validated = $request->validated();
        $image = $request->file('foto_url');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $request->file('foto_url')->storeAs('public/fotos', $name);
        $user = new User();
        $user->fill($validated);
        $user->foto_url = $name;
        // dd($user);
        $user->password = Hash::make($validated['data_nascimento']);
        $user->save();
        
        // TODO: Store certificado
        // if ($user->tipo_socio == "P" && !isset($request->file('file_licenca'))
        // && isset($request->file('file_licenca'))) {
        //     $pathLicenca = 'docs_piloto/licenca_' . $user->id . '.pdf';
        //     $pathCertificado = 'docs_piloto/licenca_' . $user->id . '.pdf';
        //     Storage::put($pathLicenca, $request->file('file_licenca'));
        //     Storage::put($pathCertificado, $request->file('file_certificado'));
        // }


       
        $user->notify(new SocioCriado);

        return redirect()
            ->route('socios.index')
            ->with('success', 'Utilizador adicionado com sucesso!');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('socios.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {

        if(! is_null($request['foto_url'])) {
            $image = $request->file('foto_url');
            $name = time().'.'.$image->getClientOriginalExtension();
            $path = $request->file('')->storeAs('public/fotos', $name);
            $user->foto_url = $name;
        }
        
        $user->fill($request->validated()); //NOTE: Por alguma razao nao estava a fazer fill do classe_socio
       // $user->classe_socio = $request->validated()['classe_socio'];
        $user->save();


        return redirect()
            ->route('socios.index')
            ->with('success', 'Utilizador atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        /*
        if ($user->movimentos->isEmpty()) {
            $user->forceDelete();
            $user->valores()->delete();
        } else {
        $user->delete();
        }
        */

        $user->forceDelete();

        return redirect()
            ->route('socios.index')
            ->with('success', 'Utilizador apagado com sucesso!');
    }

    public function resetQuotas()
    {
        $this->authorize('reset', auth()->user());

        $users = User::all();
        foreach($users as $user)
        {
            $user->quota_paga = 0;
            $user->save();
        }

        return redirect()
            ->route('socios.index')
            ->with('success', 'Quotas reiniciadas com sucesso!');
    }

    public function deactivateSocios()
    {
        $this->authorize('reset', auth()->user());
        
        $users = User::all();
        foreach($users as $user)
        {
            if($user->quota_paga == 0){
                $user->ativo = 0;
                $user->save();
            }
        }

        return redirect()
            ->route('socios.index')
            ->with('success', 'Socios com quotas por pagar desativados com sucesso!');
    }

    public function ativarDesativarQuota(Request $request, User $socio)
    {
        $this->authorize('update', auth()->user(), $socio);
        $socio->quota_paga = $request->quota_paga;
        $socio->save();

        return redirect()->back();
    }

    public function ativarDesativarSocio(Request $request, User $socio)
    {
        $this->authorize('update', auth()->user(), $socio);

        $socio->ativo = $request->ativo;
        $socio->save();
        
        return redirect()->back();
    }    



}
