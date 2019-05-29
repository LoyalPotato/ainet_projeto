<?php

namespace App\Policies;

use App\User;
use App\Movimento;
use Illuminate\Auth\Access\HandlesAuthorization;

class MovimentoPolicy
{
    use HandlesAuthorization;

   
    public function view(User $user, Movimento $movimento)
    {
        return $user->direcao; 
    }

    public function create(User $user)
    {
        return $user->direcao; 
    }

    public function update(User $user, Movimento $movimento)
    {
        return $user->direcao; 
    }

   
}
