<?php

namespace Opencycle\Policies;

use Opencycle\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Opencycle\Membership;
use Opencycle\Role;

class MembershipPolicy
{
    use HandlesAuthorization;

    /**
     * Register a callback to run before all Gate checks.
     *
     * @param User $user
     * @return bool|null
     */
    public function before(User $user)
    {
        if ($user->hasRole(Role::ofType(Role::ADMIN))) {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can update the membership.
     *
     * @param User $user
     * @param Membership $membership
     * @return bool
     */
    public function update(User $user, Membership $membership)
    {
        return $user->id === $membership->user->id;
    }

    /**
     * Determine whether the user can delete the membership.
     *
     * @param User $user
     * @param Membership $membership
     * @return mixed
     */
    public function delete(User $user, Membership $membership)
    {
        return $user->id === $membership->user->id;
    }
}
