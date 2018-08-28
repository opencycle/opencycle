<?php

namespace Opencycle\Policies;

use Opencycle\User;
use Opencycle\Advert;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the advert.
     *
     * @param  \Opencycle\User  $user
     * @param  \Opencycle\Advert  $advert
     * @return mixed
     */
    public function update(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id;
    }

    /**
     * Determine whether the user can delete the advert.
     *
     * @param  \Opencycle\User  $user
     * @param  \Opencycle\Advert  $advert
     * @return mixed
     */
    public function delete(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id;
    }
}
