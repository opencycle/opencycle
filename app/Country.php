<?php

namespace Opencycle;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * This countries regions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
