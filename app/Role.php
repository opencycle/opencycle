<?php

namespace Opencycle;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get Role of a specific type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $type
     * @return Role
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('name', $type)->first();
    }
}
