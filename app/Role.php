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
     * @return Role|null
     */
    public static function ofType(string $type): ?Role
    {
        return static::where('name', $type)->first();
    }
}
