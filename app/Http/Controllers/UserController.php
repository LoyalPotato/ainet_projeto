<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(5);
        $pagetitle = "Sócios";
        return view('socios.index', compact('users', 'pagetitle'));
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

    public function create()
    {
        $this->authorize('create', User::class);

        $user = new User;
        $pagetitle = "Adicionar um sócio";
        return view('socios.create', compact('user', 'pagetitle'));
    }

    public function store(StoreUserRequest $request)
    {
        //foto
        $image = $request->file('noimage');
        $name = time().'.'.$image->getClientOriginalExtension();
        $path = $request->file('noimage')->storeAs('public/fotos', $name);
    
        $user = new User();
        $user->fill($request->all());
        $user->image = $name;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('socios.index')
            ->with('success', 'Utilizador adicionado com sucesso!');
    }

    public function edit(User $user)
    {
        $this->authorize('create', User::class);

        $pagetitle = "Editar um sócio";
        return view('socios.edit', compact('user', 'pagetitle'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if(! is_null($request['noimage'])) {
            $image = $request->file('noimage');
            $name = time().'.'.$image->getClientOriginalExtension();

            $path = $request->file('noimage')->storeAs('public/fotos', $name);
        }

        $user->fill($request->validated());
        $user->image = $name;
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
            ->route('socios.destroy')
            ->with('success', 'User apagado com sucesso!');
    }


}
