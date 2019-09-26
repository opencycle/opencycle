<?php

namespace Opencycle\Policies;

use Opencycle\Group;
use Opencycle\Role;
use Opencycle\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
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
     * Determine whether the user can update the group.
     *
     * @param User $user
     * @param Group $group
     * @return bool
     */
    public function update(User $user, Group $group)
    {
        return $user->isMemberOf($group) && $user->getMembership($group)->hasRole(Role::ofType(Role::ADMIN));
    }
}
