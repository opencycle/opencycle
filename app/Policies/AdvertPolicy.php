<?php

namespace OpenCycle\Policies;

use OpenCycle\User;
use OpenCycle\Advert;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the advert.
     *
     * @param  \OpenCycle\User  $user
     * @param  \OpenCycle\Advert  $advert
     * @return mixed
     */
    public function update(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id;
    }

    /**
     * Determine whether the user can delete the advert.
     *
     * @param  \OpenCycle\User  $user
     * @param  \OpenCycle\Advert  $advert
     * @return mixed
     */
    public function delete(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id;
    }
}
