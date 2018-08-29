<?php

namespace Opencycle;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * This groups posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
