<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class PasswordController extends Controller
{
    //

    public function index()
    {
        $pagetitle = 'Alterar password';

        return view('alterar_password', compact('pagetitle'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);
        //TODO: Por as mensagens de erro consistentes
        if (!Hash::check($request->get('old_password'), auth()->user()->getAuthPassword())) {
            // $request->session()->flash('old_password','Password nao é igual à anterior');
            return back()->with('old_password','Password nao é igual à anterior');
        }

        /* 
        BUG: 
        Session is missing expected key [errors].
        Da-me isto no teste US05
        */
        //NOTE: Nao posso usar o User que é passado na funçao? Nao é o que esta a fazer o pedido?
        auth()->user()->password = Hash::make($request->get('password'));
        auth()->user()->save();

        //NOTE: With flash message
        return redirect()->back()->with('pass_change', 'Password alterada com sucesso!');
    }
}
