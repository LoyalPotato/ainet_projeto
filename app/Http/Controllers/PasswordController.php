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
        dd($user);
        if (!Hash::check($request->get('old_password'), auth()->user()->getAuthPassword())) {
            return back()->withErrors(['Password nao é igual à anterior']);
        }
        /* 
        NOTE: 
        Aqui meto a nova pass já hashed ou passo a nao hashed e dps faz o hash?
        
        */
        //Hash::make($request->get('password'));

        return redirect()->back();
    }
}
