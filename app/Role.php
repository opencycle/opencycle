<?php

namespace Opencycle;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get Role of a specific type.
     *
     * @param string $type
     * @return Role
     */
    public static function ofType(string $type)
    {
        return static::where('name', $type)->first();
    }
}
