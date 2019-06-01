<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

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
        $users = User::all();
        return view('socios.index', compact('users'));
    }

    public function showFichas(User $user)
    {
        $users = User::paginate(20);
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

    public function viewCertLice(User $piloto)
    {
        $this->authorize('viewCertLice', $piloto);
        return view('socios.pilotos.licenca', compact('piloto'));
    }

    public function showCertificado(User $piloto)
    {
        //NOTE: Como ta na public folder qualquer um pode aceder?


        $this->authorize('viewCertLice', $piloto);
        // certificado_10001
        // $certificado = Storage::get('/storage/app/docs_piloto/certificado_'.$piloto->id.'.pdf');
        $path = storage_path('app/public/docs_piloto/certificado_' . $piloto->id . '.pdf');


        return response()->file($path); //WORKING, but shows full page


        // return view('socios.pilotos.certificado', compact('piloto'));
        // ->file('/storage/app/docs_piloto/certificado_'.$piloto->id.'.pdf')
        // ->header('Content-Type', 'pdf');
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
        $image = $request->file('foto_url');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $path = $request->file('foto_url')->storeAs('public/fotos', $name);

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
        $this->authorize('edit', $user);

        $pagetitle = "Editar um sócio";
        return view('socios.edit', compact('user', 'pagetitle'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        if (!is_null($request['foto_url'])) {
            $image = $request->file('foto_url');
            $name = time() . '.' . $image->getClientOriginalExtension();

            $path = $request->file('')->storeAs('public/fotos', $name);
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
            ->route('socios.index')
            ->with('success', 'Utilizador apagado com sucesso!');
    }
}
