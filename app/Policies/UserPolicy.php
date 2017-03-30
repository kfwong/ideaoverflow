<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->role === 'admin') {
            return true;
        }
    }

    /**
     * Determine whether the current user can update the specified user.
     *
     * @param  \App\User  $currUser
     * @param  \App\User  $userToUpdate
     * @return mixed
     */
    public function update(User $currUser, User $userToUpdate)
    {
        return $currUser->id === $userToUpdate->id;
    }
}
