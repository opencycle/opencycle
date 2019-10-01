<?php

namespace Opencycle\Policies;

use Opencycle\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create a user.
     *
     * @param User $user
     * @param Group $group
     * @return mixed
     */
    public function create(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \Opencycle\User  $user
     * @param  \Opencycle\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \Opencycle\User  $user
     * @param  \Opencycle\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->id === $model->id;
    }
}
