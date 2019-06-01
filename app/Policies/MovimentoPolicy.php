<?php

namespace App\Policies;

use App\User;
use App\Movimento;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreMovimento;

class MovimentoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

 public function listar(User $user)
    {
        if ((isset($user->email_verified_at)) && ($user->ativo == 1)) {
            return 1;
        }else{
            return 0;
        }

        
    }



    /**
     * Determine whether the user can edit movimentos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function admin(User $user)
    {
        return $user->direcao;
    }



    


    public function delete(User $user, Movimento $movimento)
    {
        if(($user->direcao == 1) && ($movimento->confirmado == 0))
        {
            return 1;
        }else{

            if(($user->tipo_socio == 'P')
                && ($user->direcao == 0)
                && ($user->id == $movimento->piloto_id)
                    ||  ($user->id == $movimento->instrutor_id)
                && ($movimento->confirmado == 0))
            {
                return 1;
            }
        }
        return 0;
    }



    /**
     * Determine whether the user can edit movimentos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function piloto(User $user)
    {
        return $user->tipo_socio =='P' ? 1 : 0 ;
    }



/**
     *
     * @param  \App\User  $user
     * @param  \App\Movimento  $movimento
     * @return mixed
     */
    public function direcaoConfirmado(User $user,Movimento $movimento)
    {

        return ($user->direcao) && ($movimento->confirmado) ;
    }



    /**
     *
     * @param  \App\User  $user
     * @param  \App\Movimento  $movimento
     * @return mixed
     */
    public function direcaonConfirmado(User $user,Movimento $movimento)
    {        
        return $user->direcao && !($movimento->confirmado);
    }




    /**
     *
     * @param  \App\User  $user
     * @param  \App\Movimento  $movimento
     * @return mixed
     */
    public function permissoesPiloto(User $user, Movimento $movimento)
    {
        $piloto = 0;
        if($user->id == $movimento->piloto_id){
            $piloto=1;    
        }elseif ($user->id == $movimento->instrutor_id) {
            $piloto=1; 
        }
        
        return $piloto && !($movimento->confirmado);
    }
public function create(User $user)
    {

        if ($user->tipo_socio == 'P' && $user->ativo == 1 && $user->email_verified_at !=null &&  !(Hash::check($user->data_nascimento,$user->password))) {
            return 1;
        }else{
            return 0;
        }
        
    }



public function storeupdate(User $user, Movimento $movimento)
    {        

       
        if($user->tipo_socio == 'P' && $user->id == $movimento->piloto_id && ($user->email_verified_at)!=null && $user->ativo == 1 && !(Hash::check($user->data_nascimento,$user->password))){
            return 1;    
        }elseif ($user->tipo_socio == 'P' && $user->id == $movimento->instrutor_id && ($user->email_verified_at)!=null && $user->ativo == 1 && !(Hash::check($user->data_nascimento,$user->password))) {
            return 1; 
        }elseif ($user->direcao && ($user->email_verified_at)!=null && $user->ativo == 1 && !(Hash::check($user->data_nascimento,$user->password))) {
            return 1;
        }else{
        
        return 0;
    }
    }



public function update(User $user, Movimento $movimento)
    {        
        
        if($user->tipo_socio == 'P' && $user->id == $movimento->piloto_id && ($user->email_verified_at)!=null && $user->ativo == 1 && $movimento->confirmado==0 && !(Hash::check($user->data_nascimento,$user->password))){
            return 1;    
        }elseif ($user->tipo_socio == 'P' && $user->id == $movimento->instrutor_id && ($user->email_verified_at)!=null && $user->ativo == 1 && $movimento->confirmado==0 &&  !(Hash::check($user->data_nascimento,$user->password))) {
            return 1; 
        }elseif ($user->direcao && ($user->email_verified_at)!=null && $user->ativo == 1 && $movimento->confirmado==0 && !(Hash::check($user->data_nascimento,$user->password))) {
            return 1;
        }
        
        return 0;
    }

    


    public function __construct()
    {
        //
    }



}
