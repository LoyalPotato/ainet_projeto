<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $pagetitle = "Sócios";
        return view('users.index', compact('users', 'pagetitle'));
    }

    public function create()
    {
        // $this->authorize('create', User::class); //verificacao user
        $user = new User;
        $pagetitle = "Adicionar um sócio";
        return view('users.add', compact('user', 'pagetitle'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class); //verificacao user
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'Utilizador adicionado com sucesso!');
    }

    public function edit(User $user)
    {
        $pagetitle = "Editar um sócio";
        return view('users.edit', compact('user', 'pagetitle'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->validated());
        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'Utilizador atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route('users.index')
            ->with('success', 'User apagado com sucesso!');
    }

}
