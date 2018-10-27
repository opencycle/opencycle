<?php

namespace Opencycle;

use Illuminate\Database\Eloquent\Model;
use PragmaRX\CountriesLaravel\Package\Facade as Countries;

class Country extends Model
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
    }

    /**
     * This Countries Regions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    /**
     * Get info about this country.
     *
     * @return mixed
     */
    public function getInfoAttribute()
    {
        return Countries::where('cca3', $this->code)->first();
    }
}
