<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassword;
class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ativo');

    }
    
    public function index()
    {
        $pagetitle = 'Alterar password';
        return view('alterar_password', compact('pagetitle'));
    }
    public function update(ChangePassword $request, User $user)
    {
        $validated = $request->validated();
        //NOTE: Nao posso usar o User que é passado na funçao? Nao é o que esta a fazer o pedido?
        auth()->user()->password = Hash::make($validated['password']);
        auth()->user()->save();
        //NOTE: With flash message
        return redirect()->back()->with('pass_change', 'Password alterada com sucesso!');
    }
}