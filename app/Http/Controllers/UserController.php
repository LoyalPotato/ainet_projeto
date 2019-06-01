<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
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
        return view('socios.ativar', compact('users'));
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
        $path = storage_path('app/public/docs_piloto/licenca_' . $piloto->id . '.pdf');
        return response()->file($path);
    }

    public function showCertificado(User $piloto)
    {
        $this->authorize('viewCertLice', $piloto);
        $path = storage_path('app/public/docs_piloto/certificado_' . $piloto->id . '.pdf');
        return response()->file($path); //WORKING, but shows full page
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

        $image = $request->file('foto_url');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $path = $request->file('foto_url')->storeAs('public/fotos', $name);

        $user = new User();
        $user->fill($request->all());
        $user->foto_url = $name;
        $user->password = Hash::make($request->password);
        $user->save();

        $mail = Mail::to($request->$user->email)
        ->send(
            new UserCreated($user)
        );

        dd($mail);

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
