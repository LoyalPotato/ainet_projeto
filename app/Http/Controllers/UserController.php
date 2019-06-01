<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SocioCriado;
use Illuminate\Support\Facades\Storage;



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
        // dd($user);
        $pagetitle = "Sócios";
        return view('socios.index', compact('user', 'pagetitle'));
    }

    public function show(User $user)
    {
        return view('socios.index', compact('user'));
    }

    public function showFichas(User $user)
    {
        $users = User::paginate(10);
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
        return view('socios.ativar-desativar', compact('users'));
    }
    //TODO: Ativar 
    public function ativar(User $users)
    {
        dd($users);

        return redirect()->back();
    }
    // TODO: Desativar
    public function desativar(User $users)
    {
        dd($users);

        return redirect()->back();
    }

    public function resetQuotas()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->quota_paga = 0;
        }
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
        $this->authorize('create', User::class);
        $validated = $request->validated();
        $image = $request->file('file_foto');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $request->file('file_foto')->storeAs('public/fotos', $name);
        $user = new User();
        $user->fill($validated);
        $user->foto_url = $name;
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
        $this->authorize('ativo', $user);

        return view('socios.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $validated = $request->validated();

        if (!is_null($request['foto_url'])) {
            $image = $request->file('foto_url');
            $name = time() . '.' . $image->getClientOriginalExtension();

            $path = $request->file('')->storeAs('public/fotos', $name);
        }

        $user->fill($request->validated());
        $user->foto_url = $name;
       
        $user->save();

        return redirect()
            ->route('socios.index')
            ->with('success', 'Utilizador atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();

        return redirect()
            ->route('socios.index')
            ->with('success', 'Utilizador apagado com sucesso!');
    }
}
