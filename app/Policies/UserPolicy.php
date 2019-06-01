<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->direcao; 
    }

    public function create(User $user)
    {
        return $user->direcao;
    }
    
    public function edit(User $user)
    {
        return $user->direcao;
    }

    public function ativo(User $user)
    {
        return $user->ativo;
    }
    
    public function fichas(User $user)
    {
        return $user->direcao == 0;
    }

    public function update(User $user)
    {
        return $user->direcao;
    }

    public function piloto(User $user)
    {
        return $user->tipo_socio == 'P';
    }

    public function delete(User $user)
    {
        return $user->direcao;
    }

    public function viewCertLice(User $user)
    {
        return $user->tipo_socio == 'P' || $user->direcao;
    }
}
