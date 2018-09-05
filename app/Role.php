<?php

namespace Opencycle;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Admin users
     */
    const ADMIN = 'admin';

    /**
     * Moderators
     */
    const MODERATOR = 'moderator';

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
