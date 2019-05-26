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
    public function view(User $user, User $model)
    {
        return $user->direcao; 
    }

    public function create(User $user)
    {
        return $user->direcao;
    }

    public function ativo(User $user)
    {
        return $user->ativo;
    }
    
    public function delete(User $user)
    {
        return $user->direcao;
    }
}
