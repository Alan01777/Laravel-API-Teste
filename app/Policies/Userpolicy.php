<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Consulta;

class Userpolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        // Policies are classes that organize authorization logic around a particular model or resource.
        // For example, if you have a User model, you may attach authorization logic to it using a UserPolicy class.
    }

    /**
     * Determine whether the user can delete any consultas.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consulta  $consulta
     * @return bool
     */

    public function delete(User $user, Consulta $consulta): bool
    {
        return $user->id === $consulta->user_id;
    }

    /**
     * Determine whether the user can update the consulta.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consulta  $consulta
     * @return bool
     */
    public function update(User $user, Consulta $consulta): bool
    {
        return $user->id === $consulta->user_id;
    }
}
