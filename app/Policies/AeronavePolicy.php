<?php

namespace App\Policies;

use App\User;
use App\Aeronave;
use Illuminate\Auth\Access\HandlesAuthorization;

class AeronavePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the aeronave.
     *
     * @param  \App\User  $user
     * @param  \App\Aeronave  $aeronave
     * @return mixed
     */
    public function view(User $user, Aeronave $aeronave)
    {
        return $user->direcao;
    }

    /**
     * Determine whether the user can create aeronaves.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->direcao && $user->hasVerifiedEmail() && $user->ativo;
    }

    /**
     * Determine whether the user can update the aeronave.
     *
     * @param  \App\User  $user
     * @param  \App\Aeronave  $aeronave
     * @return mixed
     */
    public function update(User $user, Aeronave $aeronave)
    {
        return $user->direcao && $user->hasVerifiedEmail() && $user->ativo;
    }

    /**
     * Determine whether the user can delete the aeronave.
     *
     * @param  \App\User  $user
     * @param  \App\Aeronave  $aeronave
     * @return mixed
     */
    public function delete(User $user, Aeronave $aeronave)
    {
        return $user->direcao && $user->hasVerifiedEmail() && $user->ativo;
    }

    /**
     * Determine whether the user can restore the aeronave.
     *
     * @param  \App\User  $user
     * @param  \App\Aeronave  $aeronave
     * @return mixed
     */
    public function restore(User $user, Aeronave $aeronave)
    {
        //
    }

    // TEST:
    // public function storeAeroPiloto(User $user, Aeronave $aeronave)
    // {
    // }
}
